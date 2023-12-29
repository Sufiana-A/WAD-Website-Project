@extends('layout.app')
@section('content')
    <div class="container mt-3">
        <ul class="nav nav-tabs border-success">
            <li class="nav-item">
                <a class="nav-link active" href="#Pending" data-toggle="tab">Pending</a>
            </li>
            <li class="nav-item border-success">
                <a class="nav-link" href="#Approved" data-toggle="tab">Approved</a>
            </li>
        </ul>
        @if(Session::has('status') && Session::get('status') == 'success')
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="tab-content">
            <div class="tab-pane fade show active" id="Pending">
                @foreach($daftar_pembayaran as $dp)
                @if($dp -> status_pembayaran == 'pending')
              <div class="card mt-3 mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img-top" src="{{url('asset/front-end/image/traveling.png')}}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">pemesanan {{$dp -> reservation -> layanan}} - {{$dp -> reservation -> booking_code}}</h3>
                            <ul class="card-text no-bullet fs-5">
                                <li>Destinasi: {{$dp -> reservation -> keberangkatan}}</li>
                                <li>Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($dp -> reservation ->keberangkatan_checkin)) }}</li>
                                <li>Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($dp -> reservation ->kepulangan_checkout)) }}</li>
                            </ul>
                            <p class="text-danger">Mohon untuk mengkonfirmasi reservasi yang dilakukan oleh user.</p>
                            <a href="/detail-pembayaran/{{$dp -> id}}" class="btn btn-success">Lihat pembayaran</a>
                        </div>
                    </div>
                </div>
              </div>
              @endif
              @endforeach
            </div>
            <!-- konten untuk tab ongoind -->
            <div class="tab-pane fade" id="Approved">
                @foreach($daftar_pembayaran as $dp)
                @if($dp -> status_pembayaran == 'approved')
                <div class="card mt-3 mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img-top" src="{{url('asset/front-end/image/traveling.png')}}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">pemesanan {{$dp -> reservation -> layanan}} - {{$dp -> reservation -> booking_code}}</h3>
                            <ul class="card-text no-bullet fs-5">
                                <li>Destinasi: {{$dp -> reservation -> keberangkatan}}</li>
                                <li>Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($dp -> reservation ->keberangkatan_checkin)) }}</li>
                                <li>Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($dp -> reservation ->kepulangan_checkout)) }}</li>
                            </ul>
                            <p class="text-danger">Mohon untuk mengkonfirmasi reservasi yang dilakukan oleh user.</p>
                            <a href="/detail-pembayaran/{{$dp -> id}}" class="btn btn-success">Lihat pembayaran</a>
                        </div>
                    </div>
                </div>
              </div>
              @endif
              @endforeach
            </div>
        </div>
    </div>      
@endsection