<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


// logic
class authController extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function register1(){
        return view('pages.register-1');
    }
    // proses step 1
    public function processStep1(Request $request)
    {
        // Simpan data ke dalam sesi atau variabel sementara
        
        session(['username' => $request->input('username')]);
        session(['email' => $request->input('email')]);

       return redirect('/register2');
    }

    public function register2(){
        return view('pages.register-2');
    }
    public function processStep2(Request $request)
    {
        // Simpan data ke dalam sesi atau variabel sementara
        session(['nik' => $request->input('nik')]);
        session(['nama_lengkap' => $request->input('nama_lengkap')]);
        session(['tanggal_lahir' => $request->input('tanggal_lahir')]);
        session(['alamat' => $request->input('alamat')]);
        session(['jenis_kelamin' => $request->input('jenis_kelamin')]);

        return redirect('/register3');
    }

    public function register3(){
        return view('pages.register-3');
    }
    public function processStep3(Request $request)
    {
        // Validasi input jika diperlukan
        
        $request->validate([
            'password' => 'confirmed'
        ]);
        // session = tempat simpan variabel sementara

        // Simpan data ke dalam sesi atau variabel sementara
        session(['password' => Hash::make($request->password)]);

        $testing = User::create([
            'username' => session('username'),
            'email' => session('email'),
            'nik' => session('nik'),
            'nama_lengkap' => session('nama_lengkap'),
            'tanggal_lahir' => session('tanggal_lahir'),
            'alamat' => session('alamat'),
            'jenis_kelamin' => session('jenis_kelamin'),
            'password' => session('password'),
        ]);

        // Hapus sesi atau variabel sementara setelah registrasi selesai
        session()->forget(['username', 'email', 'nik', 'nama', 'tanggal_lahir', 'alamat', 'jenis_kelamin', 'password']);

        return redirect('/login');      
    }

     public function cekLogin(Request $request){   
         $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } 
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } 
        return redirect()->back()->with('error', 'Proses login gagal.');
    }   
    public function Logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
