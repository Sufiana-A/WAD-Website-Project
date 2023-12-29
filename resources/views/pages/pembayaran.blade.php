@extends('layout.app')
  @section('content')


    <div class="container mb-5">
        <h2 class="text-center mb-5">Pembayaran pemesanan {{$pembayaran -> layanan}} - {{$pembayaran -> booking_code}}</h2>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <h4 class="card-title">Total biaya: Rp{{number_format($pembayaran->biaya, 0)}}</h4>
                                <h5 class="card-text mb-5">Silakan lakukan pembayaran melalui QRIS dan unggah bukti pembayaran Anda.</h5>
                            </div>
                            <div class="col-md-6">
                                <img src="{{url('asset/front-end/image/QR.jpeg')}}" alt="" class="rounded float-end img-thumbnail" width="200px" height="200px">
                            </div>
                        </div>
                    </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="paymentProof">Unggah Bukti Pembayaran</label>
                                <div class="input-group mb-2 fs-5">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="paymentProof" name="bukti_pembayaran" accept=".jpeg,.jpg,.png" required>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" type="reset" id="removeFile">Hapus</button>
                                    </div>
                                </div>
                                <small id="fileHelp" class="form-text text-muted">Hanya menerima file .jpg dan .png</small>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary mt-3">Kirim Bukti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @endsection