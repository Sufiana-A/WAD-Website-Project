<?php

namespace App\Http\Controllers;

use App\Models\Payment; //import class Payment dari direktori App\Models
use App\Models\Reservation; //import class Reservation ...
use App\Models\User; //import class User ...
use Illuminate\Http\Request; //import request buat nanganin http request
use Illuminate\Support\Facades\Auth; //buat otentikasi
use Illuminate\Support\Facades\DB; //buat interaksi sama DB
use Illuminate\Support\Facades\Hash; //buat keperluan hashing pw
use Illuminate\Support\Facades\Session; //buat nyimpen dan ngambil session

class userController extends Controller
{
    //reservasi pesawat/kereta/hotel di my order
    //ngambil data dari db
    public function myOrder(){
        //belum bayar
        $proses_reservasi = DB::table('reservations')
                            ->where('email', Auth::user()->email)
                            ->whereNotExists(function ($query) {
                                $query->select(DB::raw(1))
                                    ->from('payments')
                                    ->whereColumn('payments.id_reservation', 'reservations.id');
                            })
                            ->orderByDesc('reservations.created_at')
                            ->get();
        //udah bayar
        $proses_konfirmasi = DB::table('reservations')
                            ->join('payments', 'reservations.id', '=', 'payments.id_reservation')
                            ->where('reservations.email', Auth::user()->email)
                            ->orderByDesc('payments.created_at')
                            ->get();
        //udah lewat checkout reservasinya dari hari ini
        $reservasi_complete = DB::table('reservations')
                            ->join('payments', 'reservations.id', '=', 'payments.id_reservation')
                            ->where('reservations.email', Auth::user()->email)
                            ->whereDate('reservations.kepulangan_checkout', '<', now())
                            ->orderByDesc('payments.created_at')
                            ->get(); 
        //mengembalikan tampilan myOrder yg ada dlm pages serta nilai-nilai array dalam compact             
        return view('pages.myOrder', compact(['proses_reservasi', 'proses_konfirmasi', 'reservasi_complete']));
    }

    //nampilin reservasi-pesawat dalam pages
    public function reservasi_pesawat(){
        // return view(folder.folder.nama file)
        // nama file
        return view('pages.reservasi-pesawat');
    }
    
    //ngambil isisn form ke db buat reservasi pesawat
    public function plane_reservations(Request $request){
        $plane_reservations = Reservation::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'layanan' => $request->layanan,
            'keberangkatan' => $request->keberangkatan,
            'destinasi_hotel' => $request->destinasi_hotel,
            'keberangkatan_checkin' => $request->keberangkatan_checkin,
            'kepulangan_checkout' => $request->kepulangan_checkout,
            'quantity' => $request->quantity,
            'booking_code' => 0000,
            'duduk_kamar' => '',
            'biaya' => null,
            'status' => 'menunggu konfirmasi admin'
        ]);
        if($plane_reservations){
            Session::flash('status', 'success');
            Session::flash('message', 'reservasi kamu berhasil ditambahkan, mohon menunggu konfirmasi dari admin');
            return redirect('/my-order');
        } 
    }
    
    //nampilin reservasi-kereta dlm pages
    public function reservasi_kereta(){
        return view('pages.reservasi-kereta');
    }
    //ngambil isian form ke db buat reservasi kereta
    public function train_reservations(Request $request){
        $train_reservations = Reservation::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'layanan' => $request->layanan,
            'keberangkatan' => $request->keberangkatan,
            'destinasi_hotel' => $request->destinasi_hotel,
            'keberangkatan_checkin' => $request->keberangkatan_checkin,
            'kepulangan_checkout' => $request->kepulangan_checkout,
            'quantity' => $request->quantity,
            'booking_code' => 0000,
            'duduk_kamar' => '',
            'biaya' => null,
            'status' => 'menunggu konfirmasi admin'
        ]);
        if($train_reservations){
            Session::flash('status', 'success');
            Session::flash('message', 'reservasi kamu berhasil ditambahkan, mohon menunggu konfirmasi dari admin');
            return redirect('/my-order');
        } 
    }
    //nampilin reservasi-hotel dlm pages
    public function reservasi_hotel(){
        return view('pages.reservasi-hotel');
    }
    //ngambil isian form ke db buat reservasi hotel
    public function hotel_reservations(Request $request){
        $hotel_reservations = Reservation::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'layanan' => $request->layanan,
            'keberangkatan' => '',
            'destinasi_hotel' => $request->destinasi_hotel,
            'keberangkatan_checkin' => $request->keberangkatan_checkin,
            'kepulangan_checkout' => $request->kepulangan_checkout,
            'quantity' => $request->quantity,
            'booking_code' => 0000,
            'duduk_kamar' => '',
            'biaya' => null,
            'status' => 'menunggu konfirmasi admin'
        ]);
        if($hotel_reservations){
            Session::flash('status', 'success');
            Session::flash('message', 'reservasi kamu berhasil ditambahkan, mohon menunggu konfirmasi dari admin');
            return redirect('/my-order');
        } 
    }
    //fitur pembayaran
     public function pembayaran($id){
        $pembayaran = Reservation::find($id);
        return view('pages.pembayaran', compact(['pembayaran']));
    }
    public function payment(Request $request, $id){
        $payment = Reservation::find($id);
        $bukti_pembayaran = $request->file('bukti_pembayaran')->clientExtension();
        $fileBuktiPembayaran = auth()->guard('web')->user()->nama_lengkap.'-'.now()->timestamp.'-'.'bukti pembayaran'.'.'.$bukti_pembayaran;
        $request->file('bukti_pembayaran')->storeAs('images', $fileBuktiPembayaran);
        $request['bukti_pembayaran'] = $fileBuktiPembayaran;
        $create_payments = Payment::create([
            'id_reservation' => $payment->id,
            'bukti_pembayaran' => $fileBuktiPembayaran,
            'status_pembayaran' => 'pending'
        ]);
        if($create_payments){
            Session::flash('status', 'success');
            Session::flash('message', 'Pemmbayaran berhasil di upload');
            return redirect('/my-order');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Pembayaran gagal di upload');
            return redirect('/my-order');
        }
    }

    //fitur batalin pembayaran
    public function deletePembayaran($id){
        $deletePemesanan = Payment::find($id);
        $deletePemesanan->delete();
        if($deletePemesanan){
            Session::flash('status', 'success');
            Session::flash('message', 'pembayaran berhasil dibatalkan');
            return redirect('/my-order');
        } else{
            Session::flash('status', 'failed');
            Session::flash('message', 'pembayaran gagal dibatalkan');
            return redirect('/my-order');
        }
    }

    //dari payment sama reservasi
    public function tiket($id){
        $tiket = Payment::find($id);
        return view('pages.tiket', compact(['tiket']));
    }
    //semua reservasi
    public function deletePemesanan($id){
        $deletePemesanan = Reservation::find($id);
        $deletePemesanan->delete();
        if($deletePemesanan){
            Session::flash('status', 'success');
            Session::flash('message', 'Pemesanan berhasil dibatalkan');
            return redirect('/my-order');
        } else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Pemesanan gagal dibatalkan');
            return redirect('/my-order');
        }
    }
    
    //nampilin profile dlm pages
    public function profile(){
        return view('pages.profile');
    }
    //edit profile user
    public function editProfile(Request $request)
    {
        $request->validate([
            'password' => 'nullable|confirmed|min:6',
        ]);

        $editProfile = User::find(Auth::user()->id);

        // Update hanya jika ada input password
        if ($request->filled('password')) {
            $editProfile->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'password' => Hash::make($request->password),
            ]);
        } else {
            // Jika password tidak diisi, hanya update name dan email
            $editProfile->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
            ]);
        }

        if ($editProfile) {
            Session::flash('status', 'success');
            Session::flash('message', 'Profile berhasil diperbarui');
            return redirect('/profile');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Profile gagal diperbarui');
            return redirect('/profile');
        }
    }
}
