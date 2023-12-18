 @extends('layout.login')
  @section('content')
 <div class="logo-space d-flex align-items-center justify-content-center">
        <img src="{{url('asset/front-end/image/logo-perusahaan.jpg')}}" alt="logo-perusahaan" width="130" height="48">
        <h3 class="ms-3">Welcome to Windira Tour</h3>
    </div>
    <div class="container register-container bg-white rounded p-5" style="max-width: 500px; max-height: 100%; margin: 125px auto;">
        <h2 class="text-center mb-5">Register</h2>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NIK</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nik" required placeholder="masukan NIK...">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nama_lengkap" required placeholder="masukan nama lengkap...">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal lahir</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal_lahir" required placeholder="masukan tanggal lahir...">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" required placeholder="masukan alamat...">
            </div>
            <div class="form-outline">
                    <label class="form-label mb-3" for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline mb-3">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" required>
                      <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline mb-3">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" required>
                      <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                  </div>
            <button type="submit" class="btn btn-success btn-block w-100">Next</button>
        </form>
        <div class="mt-4 text-center">
            <p>Already have an account? <a href="/login" class="text-success">Sign In</a></p>
        </div>
    </div>
    @endsection