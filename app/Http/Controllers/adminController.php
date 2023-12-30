<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    //konfirmasi semua reservasi
    public function konfirmasi_reservasi(){
        //belum dikonfirmasi 
        $proses_reservasi = DB::table('reservations')
                            ->where('status', 'menunggu konfirmasi admin')
                            ->orderByDesc('reservations.created_at')
                            ->get();
        //udah dikonfirmasi
        $reservasi_berlangsung = DB::table('reservations')
                            ->where('status', 'dikonfirmasi admin')
                            ->get();
        //reservasi selesai
        $reservasi_complete = DB::table('reservations')
                            ->where('status', 'dikonfirmasi admin')
                            ->whereDate('reservations.kepulangan_checkout', '<', now())
                            ->get();
        return view('pages.admin.konfirmasi_reservasi', compact(['proses_reservasi', 'reservasi_berlangsung', 'reservasi_complete']));
    }
    //semua detail reservasi admin
    public function detail_reservasi($id){
        $detail_konfirmasi_reservasi = Reservation::find($id);
        return view('pages.admin.detail_reservasi', compact(['detail_konfirmasi_reservasi']));

    }
    //mengkonfirmasi semua reservasi
    public function confirm_reservation(Request $request, $id){
        $confirm_reservation = Reservation::find($id);
        $booking_code = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $confirm_reservation->update([
            'booking_code' => $booking_code,
            'duduk_kamar' => $request->duduk_kamar,
            'biaya' => $request->biaya,
            'status' => 'dikonfirmasi admin',
        ]);
        if($confirm_reservation){
            Session::flash('status', 'success');
            Session::flash('message', 'Reservasi berhasil dikonfirmasi');
            return redirect('/konfirmasi-reservasi');
        } else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Reservasi gagal dikonfirmasi');
            return redirect('/konfirmasi-reservasi');
        }
    }
    //lihat daftar pembayaran
    public function daftar_pembayaran(){
        $daftar_pembayaran = Payment::all();
        return view('pages.admin.status_pembayaran', compact(['daftar_pembayaran']));
    }
    //lihat detail pembayaran dari user
    public function detail_pembayaran($id){
        $detail_pembayaran = Payment::find($id);
        return view('pages.admin.detail_pembayaran', compact(['detail_pembayaran']));
    }
    //update status pembayaran
    public function update_payment(Request $request, $id){
        $update_payment = Payment::find($id);
        $update_payment->update([
            'status_pembayaran' => $request->status_pembayaran,
        ]);
        if($update_payment){
            Session::flash('status', 'success');
            Session::flash('message', 'Status pembayaran berhasil diupdate');
            return redirect('/daftar-pembayaran');
        } else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Status pembayaran gagal diupdate');
            return redirect('/daftar-pembayaran');
        }
    }
    //lihat data user
    public function dataUser(){
        $dataUser = User::all();
        return view('pages.admin.dataUser', compact(['dataUser']));
    }
    //hapus user
    public function deleteUser($id){
        $deleteUser = User::find($id);
        $deleteUser->delete();
        if($deleteUser){
            Session::flash('status', 'success');
            Session::flash('message', 'Data user berhasil dihapus');
            return redirect('/data-user');
        } else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Data user gagal dihapus');
            return redirect('/data-user');
        }
    }
    //edit user
    public function editUser($id){
        $editUser = User::find($id);
        return view('pages.admin.editUser', compact(['editUser']));
    }
    public function updateUser(Request $request, $id)
    {
        $editProfile = User::find($id);
        $editProfile->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin
            
        ]);
        if ($editProfile) {
            return redirect()->back()->with('success', 'Data user berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Data user gagal diperbarui.');
        }
    }
}
