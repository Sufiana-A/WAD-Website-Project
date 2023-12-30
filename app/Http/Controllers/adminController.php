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
    
    //lihat detail pembayaran dari user
    
    //update status pembayaran
    
    //lihat data user
    
    //hapus user
    
    //edit user
    
    
}