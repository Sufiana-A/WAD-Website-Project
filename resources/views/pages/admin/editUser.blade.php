@extends('layout.app')
@section('content')
<section id="insert">
      <div class="container insert">
        @if (session('error'))
            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="titleInsert" align="center">Edit user - {{$editUser -> nama_lengkap}}</h1>
        <form enctype="multipart/form-data" method="POST" action="" class="form-input">
            @method('put')
            @csrf
          <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input
              type="email"
              class="form-control"
              value="{{$editUser -> email}}"
              name="email"
              readonly
            />
          </div>
          <div class="mb-3">
            <label for="inputEmail" class="form-label">NIK</label>
            <input
              type="text"
              class="form-control"
              value="{{$editUser -> nik}}"
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
              value="{{$editUser -> nama_lengkap}}"
              name="nama_lengkap"
              required
            />
          </div>
          <div class="mb-3">
            <label for="inputMerk" class="form-label">Tanggal lahir</label>
            <input
              type="date"
              class="form-control"
              value="{{$editUser -> tanggal_lahir}}"
              name="tanggal_lahir"
              required
            />
          </div>
          <div class="mb-3">
            <label for="inputMerk" class="form-label">Alamat</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{$editUser -> alamat}}</textarea>
          </div>
          <div class="form-outline mb-3">
                    <label class="form-label mb-3" for="nohp">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline mb-3">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" @if($editUser -> jenis_kelamin == 'laki-laki') checked @endif>
                      <label class="form-check-label" for="inlineRadio1">laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline mb-3">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" @if($editUser -> jenis_kelamin == 'Perempuan') checked @endif>

                      <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                  </div>
          <div class="mb-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="btn-update" >Update</button>
          </div>
        </form>
      </div>
    </section>
@endsection