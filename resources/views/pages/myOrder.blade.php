@extends('layout.app')
@section('content')
    <div class="container mt-3">
        <ul class="nav nav-tabs border-success">
            <li class="nav-item">
                <a class="nav-link active" href="#onprocess" data-toggle="tab">On Process</a>
            </li>
            <li class="nav-item border-success">
                <a class="nav-link" href="#ongoing" data-toggle="tab">Ongoing</a>
            </li>
            <li class="nav-item border-success">
                <a class="nav-link" href="#completed" data-toggle="tab">Completed</a>
            </li>
        </ul>
        @if(Session::has('status') && Session::get('status') == 'success')
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="tab-content">
            <!-- on process -->
            <div class="tab-pane fade show active" id="onprocess">
            @foreach($proses_reservasi as $pr)
              <div class="card mt-3 mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img-top" src="{{url('asset/front-end/image/traveling.png')}}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">Pemesanan {{$pr -> layanan}} - {{$pr -> booking_code}}</h3>
                            <ul class="card-text no-bullet fs-5">
                                <li>Destinasi: {{$pr -> destinasi_hotel}}</li>
                                <li>Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($pr->keberangkatan_checkin)) }}</li>
                                <li>Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($pr->kepulangan_checkout)) }}</li>
                            </ul>
                            @if($pr -> status == "menunggu konfirmasi admin")
                            <p class="text-danger">Mohon dicek secara berkala untuk mengetahui cara pembayaran.</p>
                            <a href="#" class="btn btn-success disabled">Lihat cara pembayaran</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Batalkan pesanan</button>
                            @endif
                            @if($pr -> status != "menunggu konfirmasi admin")
                            <p class="text-danger">Silahkan lihat detail pembayaran untuk melakukan pembayaran.</p>
                            <a href="/pembayaran/{{$pr -> id}}" class="btn btn-success">Lihat cara pembayaran</a> 
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Batalkan pesanan</button>
                            @endif
                        </div>
                    </div>
                </div>
                <form action="/batal-pesanan/{{$pr -> id}}" method="post">
                @csrf
                @method('delete')
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Batalkan pesanan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin membatalkan pesanan ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Batalkan</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
              </div>
            @endforeach
            </div> 
                    <!-- ongoing -->
                    <div class="tab-pane fade show active" id="ongoing">
            @foreach($proses_konfirmasi as $pk)
              <div class="card mt-3 mb-4">
                <div class="row no-gutters">
                        <div class="col-md-4">
                            <img class="card-img-top" src="{{url('asset/front-end/image/traveling.png')}}" alt="Card image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title">Pemesanan {{ $pk->layanan }} - {{ $pk->booking_code }}</h3>
                                <ul class="card-text no-bullet fs-5">
                                    <li>Destinasi: {{ $pk->destinasi_hotel }}</li>
                                    <li>Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($pk->keberangkatan_checkin)) }}</li>
                                    <li>Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($pk->kepulangan_checkout)) }}</li>
                                </ul>

                                <p class="text-danger">Silahkan lihat tiket untuk mengecek status pembayaran.</p>
                                <a href="/tiket/{{ $pk->id }}" class="btn btn-success">Tiket pemesanan</a>

                                
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $pk->id }}">Batalkan pesanan</button>
                                
                            </div>
                        </div>
                    </div>
                <form action="/batal-pembayaran/{{ $pk->id }}" method="post">
                        @csrf
                        @method('delete')

                    <div class="modal fade" id="exampleModal2{{ $pk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Batalkan pesanan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin membatalkan pesanan ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Batalkan</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
              </div>
            @endforeach
            </div>
@endsection