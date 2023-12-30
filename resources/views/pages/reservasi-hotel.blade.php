@extends('layout.app')
  @section('content')
  <div class="container-fluid p-4" style="background-image: url('{{ asset('asset/front-end/image/background web.jpg') }}'); background-size: cover; background-blend-mode: overlay; background-color: rgba(255, 255, 255, 0.5);">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2 class="text-center fw-bold mb-5">Form reservasi - Hotel</h2>
            <form method="post" action="" class="w-75 m-auto">
                @csrf
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control" id="fullName" readonly name="nama_lengkap" @auth value="{{Auth::user()->nama_lengkap}}" @else placeholder="masukan nama lengkap..."  @endauth>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label for="email" class="col-sm-12 col-md-4 col-form-label">Email</label>
                <div class="col-sm-12 col-md-8">
                  <input type="email" class="form-control" id="email" readonly name="email" @auth value="{{Auth::user()->email}}" @else placeholder="masukan nama lengkap..." name="email" @endauth>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label for="serviceName" class="col-sm-12 col-md-4 col-form-label">Jenis Layanan</label>
                <div class="col-sm-12 col-md-8">
                  <select class="form-control" id="serviceName" name="layanan">
                    <option disabled value="pesawat">Pesawat</option>
                    <option selected value="hotel">Hotel</option>
                    <option disabled value="kereta api">Kereta Api</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Nama hotel - Lokasi</label>
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control" id="fullName" placeholder="Misalnya Royal Hotel - Semarang" name="destinasi_hotel" required>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Tanggal checkin</label>
                <div class="col-sm-12 col-md-8">
                  <input type="date" class="form-control" id="fullName" name="keberangkatan_checkin" required>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Tanggal checkout</label>
                <div class="col-sm-12 col-md-8">
                  <input type="date" class="form-control" id="fullName" name="kepulangan_checkout" required>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Jumlah kamar dipesan</label>
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control" id="fullName" placeholder="masukan jumlah kamar yang dipesan..." name="quantity" required>
                </div>
              </div>
              <div class="form-group row justify-content-end mb-4">
                  <div class="col-sm-12 d-flex justify-content-end">
                      @auth('web')
                      <button type="submit" class="btn btn-success w-auto px-5">Pesan</button>
                      @else
                      <button type="button" class="btn btn-success w-auto px-5" onclick="event.preventDefault(); location.href='{{ url('login') }}';">Login terlebih dahulu</button>
                      @endauth
                  </div>
              </div>
            </form>
        </div>
    </div>
  </div>
 @endsection