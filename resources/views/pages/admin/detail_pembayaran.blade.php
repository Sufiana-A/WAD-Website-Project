@extends('layout.app')
  @section('content')
    <div class="container mb-5">
        <h2 class="text-center">Pembayaran pemesanan {{$detail_pembayaran -> reservation -> layanan}} - {{$detail_pembayaran -> reservation -> booking_code}}</h2>
        <hr class="mx-auto w-25 border border-dark border-2 opacity-50">
        <h4 class="text-center fw-normal mb-5">Atas nama {{$detail_pembayaran -> reservation -> nama_lengkap}}</h4>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <ul class="card-text no-bullet fs-5">
                                <li class="mb-3">Destinasi: {{$detail_pembayaran -> reservation -> keberangkatan}}</li>
                                <li class="mb-3">Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($detail_pembayaran -> reservation ->keberangkatan_checkin)) }}</li>
                                <li class="mb-3">Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($detail_pembayaran -> reservation ->kepulangan_checkout)) }}</li>
                            </ul>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset ('storage/images/'.$detail_pembayaran -> bukti_pembayaran) }}" alt="" class="rounded float-end img-thumbnail" width="200px" height="200px">
                            </div>
                        </div>
                    </div>
                        <form method="post" action="" enctype="multipart/form-data" class="w-75">
                            @method('PUT')
                            @csrf
                            <div class="form-group ms-5">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Status pembayaran</label>
                                    <select class="form-control" name="status_pembayaran">
                                        <option value="pending" @if($detail_pembayaran -> status_pembayaran == "pending") selected @endif>pending</option>
                                        <option value="approved" @if($detail_pembayaran -> status_pembayaran == "approved") selected @endif>approved</option>
                                        <option value="ditolak" @if($detail_pembayaran -> status_pembayaran == "ditolak") selected @endif>ditolak</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection