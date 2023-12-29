@extends('layout.login')
  @section('content')
    <div class="logo-space d-flex align-items-center justify-content-center">
        <img src="{{url('asset/front-end/image/logo-perusahaan.jpg')}}" alt="logo-perusahaan" width="130" height="48">
        <h3 class="ms-3">Welcome to Windira Tour</h3>
    </div>
    <div class="container login-container bg-white rounded p-5" style="max-width: 400px; margin: 50px auto;">
        <h2 class="text-center mb-5">Sign In</h2>
       @if (session('error'))
            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username/Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan username/email terdaftar..." name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan password..." name="password">
            </div>
            <button type="submit" class="btn btn-success btn-block w-100">Submit</button>
        </form>
        <div class="mt-4 text-center">
            <p>Dont have an account ? <a href="/register" class="text-success">Register</a></p>
        </div>
    </div>
    
   @endsection