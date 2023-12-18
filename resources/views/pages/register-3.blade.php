 @extends('layout.login')
  @section('content')
 <div class="logo-space d-flex align-items-center justify-content-center">
        <img src="{{url('asset/front-end/image/logo-perusahaan.jpg')}}" alt="logo-perusahaan" width="130" height="48">
        <h3 class="ms-3">Welcome to Windira Tour</h3>
    </div>
    <div class="container register-container bg-white rounded p-5" style="max-width: 500px; max-height: 600px; margin: 125px auto;">
        <h2 class="text-center mb-5">Register</h2>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" required placeholder="masukan password...">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">confirm password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" required placeholder="masukan ulang password...">
            </div>
            <button type="submit" class="btn btn-success btn-block w-100">Next</button>
        </form>
        <div class="mt-4 text-center">
            <p>Already have an account? <a href="/login" class="text-success">Sign In</a></p>
        </div>
    </div>
    @endsection