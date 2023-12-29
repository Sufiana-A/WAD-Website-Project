@extends('layout.app')
  @section('content')
  <div class="container-fluid p-4" style="background-image: url('{{ asset('asset/front-end/image/background web.jpg') }}'); background-size: cover; background-blend-mode: overlay; background-color: rgba(255, 255, 255, 0.5);">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2 class="text-center fw-bold">Detail reservasi {{$detail_konfirmasi_reservasi -> layanan}} - {{$detail_konfirmasi_reservasi -> id}}</h2>
            <hr class="mx-auto w-25 border border-dark border-2 opacity-50">
            <h4 class="text-center fw-normal mb-5">Booking code {{$detail_konfirmasi_reservasi -> booking_code}}</h4>
            <form method="POST" action="" class="w-75 m-auto">
              @method('PUT')
              @csrf
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control" id="fullName" readonly value="{{$detail_konfirmasi_reservasi -> nama_lengkap}}" name="nama_lengkap">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label for="email" class="col-sm-12 col-md-4 col-form-label">Email</label>
                <div class="col-sm-12 col-md-8">
                  <input type="email" class="form-control" id="email" readonly value="{{$detail_konfirmasi_reservasi -> email}}" name="email">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label for="serviceName" class="col-sm-12 col-md-4 col-form-label">Jenis Layanan</label>
                <div class="col-sm-12 col-md-8">
                  <select class="form-control" id="serviceName" name="layanan">
                    <option value="pesawat" @if($detail_konfirmasi_reservasi -> layanan == "pesawat") selected @endif>Pesawat</option>
                    <option disabled value="hotel" @if($detail_konfirmasi_reservasi -> layanan == "hotel") selected @endif>Hotel</option>
                    <option disabled value="kereta api" @if($detail_konfirmasi_reservasi -> layanan == "kereta api") selected @endif>Kereta Api</option>
                  </select>
                </div>
              </div>
              @if($detail_konfirmasi_reservasi -> layanan != 'hotel')
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Dari mana</label>
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control" id="fullName" placeholder="masukan lokasi keberangkatan..." name="keberangkatan" value="{{$detail_konfirmasi_reservasi -> keberangkatan}}" readonly>
                </div>
              </div>
              @endif
              @if($detail_konfirmasi_reservasi -> layanan != 'hotel')
              <div class="form-group row mb-4">
                  <label for="fullName" class="col-sm-12 col-md-4 col-form-label">destinasi tujuan</label>
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control" id="fullName" placeholder="masukan destinasi tujuan..." name="destinasi_hotel" value="{{$detail_konfirmasi_reservasi -> destinasi_hotel}}" readonly>
                </div>
              </div>
              @endif
              @if($detail_konfirmasi_reservasi -> layanan == 'hotel')
              <div class="form-group row mb-4 d-none">
                  <label for="fullName" class="col-sm-12 col-md-4 col-form-label">destinasi tujuan</label>
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control" id="fullName" placeholder="masukan destinasi tujuan..." name="destinasi_hotel" value="" readonly>
                </div>
              </div>
              <!-- kalo yg tidak sama dengan, berarti reservasinya yg selain hotel -->
              @endif
              <div class="form-group row mb-4">
                @if($detail_konfirmasi_reservasi -> layanan != 'hotel')
                  <label for="fullName" class="col-sm-12 col-md-4 col-form-label">tanggal keberangkatan</label>
                @endif
                @if($detail_konfirmasi_reservasi -> layanan == 'hotel')
                  <label for="fullName" class="col-sm-12 col-md-4 col-form-label">tanggal checkin</label>
                @endif
                <div class="col-sm-12 col-md-8">
                  <input type="date" class="form-control" id="fullName" name="keberangkatan_checkin" value="{{$detail_konfirmasi_reservasi -> keberangkatan_checkin}}" readonly>
                </div>
              </div>
              <div class="form-group row mb-4">
                @if($detail_konfirmasi_reservasi -> layanan != 'hotel')
                  <label for="fullName" class="col-sm-12 col-md-4 col-form-label">tanggal kepulangan</label>
                @endif
                @if($detail_konfirmasi_reservasi -> layanan == 'hotel')
                  <label for="fullName" class="col-sm-12 col-md-4 col-form-label">tanggal checkout</label>
                @endif
                <div class="col-sm-12 col-md-8">
                  <input type="date" class="form-control" id="fullName" name="kepulangan_checkout" value="{{$detail_konfirmasi_reservasi -> kepulangan_checkout}}" readonly>
                </div>
              </div>
              <div class="form-group row mb-4">
                @if($detail_konfirmasi_reservasi -> layanan != 'hotel')
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Jumlah tiket dipesan</label>
                @endif
                @if($detail_konfirmasi_reservasi -> layanan == 'hotel')
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Jumlah kamar dipesan</label>
                @endif
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control" id="fullName" placeholder="masukan jumlah tiket yang dipesan..." name="quantity" value="{{$detail_konfirmasi_reservasi -> quantity}}" readonly>
                </div>
                <!-- kalo pesawat atau kereta -->
              </div>
              @if($detail_konfirmasi_reservasi -> layanan == 'pesawat' || $detail_konfirmasi_reservasi -> layanan == 'kereta api')
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">detail tempat duduk</label>
                <div class="col-sm-12 col-md-8">
                  <textarea class="form-control" placeholder="Masukan nomor tempat duduk" id="floatingTextarea2" style="height: 100px" name="duduk_kamar">{{ $detail_konfirmasi_reservasi->duduk_kamar ?? '' }}</textarea>
                </div>
              </div>
              <!-- kalo hotel -->
              @endif
               @if($detail_konfirmasi_reservasi -> layanan == 'hotel')
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Nomor kamar hotel</label>
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control" id="fullName" placeholder="masukan jumlah tiket yang dipesan..." name="duduk_kamar" required value="{{ $detail_konfirmasi_reservasi->duduk_kamar ?? '' }}">
                </div>
              </div> 
              <!-- siapa aja -->
              @endif
              <div class="form-group row mb-4">
                <label for="fullName" class="col-sm-12 col-md-4 col-form-label">Total biaya yang harus dibayar</label>
                <div class="col-sm-12 col-md-8">
                  @if($detail_konfirmasi_reservasi -> biaya != null)
                  <input type="text" class="form-control" id="fullName" placeholder="masukan total biaya yang harus dibayar..." name="biaya" required value="Rp{{ number_format($detail_konfirmasi_reservasi->biaya, 0) }}">
                  @endif
                  @if($detail_konfirmasi_reservasi -> biaya == null)
                  <input type="text" class="form-control" id="fullName" placeholder="masukan total biaya yang harus dibayar..." name="biaya" required>
                  @endif
                </div>
              </div>
              @if($detail_konfirmasi_reservasi -> status == 'menunggu konfirmasi admin')
              <div class="form-group row justify-content-end mb-4">
                  <div class="col-sm-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-success w-auto px-5">Konfirmasi Reservasi</button>
                  </div>
              </div>
              @endif
            </form>
        </div>
    </div>
  </div>

 @endsection