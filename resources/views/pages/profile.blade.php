@extends('layout.app')
  @section('content')
<!-- insert form -->
    <section id="insert">
      <div class="container insert">
         @if(Session::has('status') && Session::get('status') == 'success')
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <h1 class="titleInsert" align="center">Profile</h1>
        <form enctype="multipart/form-data" method="POST" action="/profile/edit" class="form-input">
            @method('put')
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input
              type="email"
              class="form-control"
              value="{{Auth::user()->email}}"
              name="email"
              readonly
            />
          </div>
          <div class="mb-3">
            <label for="inputEmail" class="form-label">NIK</label>
            <input
              type="text"
              class="form-control"
              value="{{Auth::user()->nik}}"
              name="nik"
              readonly
            />
          </div>
          <div class="mb-3">
            <label for="inputNamaPemilik" class="form-label"
              >Nama</label
            >
            <input
              type="text"
              class="form-control"
              value="{{Auth::user()->nama_lengkap}}"
              name="nama_lengkap"
              required
            />
          </div>
          <div class="mb-3">
            <label for="inputMerk" class="form-label">Tanggal lahir</label>
            <input
              type="date"
              class="form-control"
              value="{{Auth::user()->tanggal_lahir}}"
              name="tanggal_lahir"
              required
            />
          </div>
          <div class="mb-3">
            <label for="inputMerk" class="form-label">Alamat</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{Auth::user()->alamat}}</textarea>
          </div>
          <div class="form-outline mb-3">
                    <label class="form-label mb-3" for="nohp">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline mb-3">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" @if(Auth::user()->jenis_kelamin == 'laki-laki') checked @endif>
                      <label class="form-check-label" for="inlineRadio1">laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline mb-3">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" @if(Auth::user()->jenis_kelamin == 'Perempuan') checked @endif>

                      <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                  </div>
          <hr>
          <h4 class="titleInsert mb-3 fw-bold" align="left">Ubah kata sandi</h4>
          <div class="mb-3">
            <label for="inputTanggalBeli" class="form-label"
              >Kata sandi baru</label
            >
            <input type="password" class="form-control" name="password" placeholder="masukan kata sandi..."  />
          </div>
          <div class="mb-3">
            <label for="inputMerk" class="form-label">Konfirmasi kata sandi baru</label>
           <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi kata sandi..."  />
          </div>
          <div class="mb-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="btn-update" >Update</button>
          </div>
        </form>
      </div>
    </section>
    <!-- end insert forrm -->
@endsection