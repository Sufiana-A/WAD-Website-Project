@extends('layout.app')
  @section('content')

      <div id="home" class="container py-0 px-0 text-center">
        <img class="d-block mx-auto mb-4" src="{{url('asset/front-end/image/hero.png')}}" alt="hero-img" width="100%" height="30%">
          <!-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          </div> -->
      </div>

      <div id="discover" class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
          <h2 class="fw-bold mb-3">Apa itu Windira Tour?</h2>
          <p class="col-lg-8 mx-auto fs-5 text-muted mb-5">
            PT. Windira Cipta Mandiri adalah perusahaan Tours dan Travel berasal dari Kota Bandung yang berdiri sejak 28 November 1996. Perusahaan ini mempunyai misi untuk menyediakan jasa perjalanan wisata di antaranya menyediakan sewa transportasi (darat dan udara), akomodasi (hotel), dan memenuhi kebutuhan dari perjalanan dinas di dalam Kota dan luar kota Bandung.
          </p>
          <div class="container d-flex justify-content-center">
            <div class="row">
              <div class="col text-center">
                <div class="position-relative">
                  <img src="{{url('asset/front-end/image/discover-lampung.png')}}" class="img-fluid" alt="discover-lampung-img" style="width:70%">
                  <h5 class="text-center fw-bold mt-3">Lampung</h5>
                  <p class="text-center">Dinas DKPP, November 2023</p>
                </div>
              </div>
              <div class="col text-center">
                <div class="position-relative">
                  <img src="{{url('asset/front-end/image/discover-semarang.png')}}" class="img-fluid" alt="discover-semarang-img" style="width:70%">
                  <h5 class="text-center fw-bold mt-3">Semarang</h5>
                  <p class="text-center">Dinas KESBANGPOL, September 2023</p>
                </div>
              </div>
              <div class="col text-center">
                <div class="position-relative">
                  <img src="{{url('asset/front-end/image/discover-malang.png')}}" class="img-fluid" alt="discover-malang-img" style="width:70%">
                  <h5 class="text-center fw-bold mt-3">Malang</h5>
                  <p class="text-center">Dinas Pertanian Tanaman Pangan dan Holtikultura, September 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @if(!auth()->guard('web')->check() && !auth()->guard('admin')->check())
      <div id="service" class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
          <h2 class="fw-bold mb-5">Layanan Windira Tour</h2>
          <p class="col-lg-8 mx-auto fs-5 text-muted mb-5">
            PT. Windira Cipta Mandiri menyediakan layanan Tour berupa booking tiket pesawat, tiket kereta api, maupun booking hotel. 
          </p>
          <div class="container d-flex justify-content-center">
            <div class="row">
              <div class="col text-center">
                <div class="position-relative">
                  <img src="{{url('asset/front-end/image/pesawat-service-img.png')}}" class="img-fluid position-relative" alt="pesawat-service-img">
                  <h3 class="textService position-absolute top-50 start-50 translate-middle">Pesawat</h3>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="/reservasi-pesawat" class="btn btn-pesan mt-3 fw-bolder d-none">
                    Pesan Sekarang
                  </a>
                </div>
              </div>
              <div class="col text-center">
                <div class="position-relative">
                  <img src="{{url('asset/front-end/image/kereta-service-img.png')}}" class="img-fluid" alt="kereta-service-img">
                  <h3 class="textService position-absolute top-50 start-50 translate-middle px-2">Kereta Api</h3>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="reservasi-kereta" class="btn btn-pesan mt-3 fw-bolder d-none">
                    Pesan Sekarang
                  </a>
                </div>
              </div>
              <div class="col text-center">
                <div class="position-relative">
                  <img src="{{url('asset/front-end/image/hotel-service-img.png')}}" class="img-fluid" alt="hotel-service-img">
                  <h3 class="textService position-absolute top-50 start-50 translate-middle px-2">Hotel</h3>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="/reservasi-hotel" class="btn btn-pesan mt-3 fw-bolder d-none">
                    Pesan Sekarang
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

      @auth('web')
      <div id="service" class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
          <h2 class="fw-bold mb-5">Layanan Windira Tour</h2>
          <p class="col-lg-8 mx-auto fs-5 text-muted mb-5">
            PT. Windira Cipta Mandiri menyediakan layanan Tour berupa booking tiket pesawat, tiket kereta api, maupun booking hotel. 
          </p>
          <div class="container d-flex justify-content-center">
            <div class="row">
              <div class="col text-center">
                <div class="position-relative">
                  <img src="{{url('asset/front-end/image/pesawat-service-img.png')}}" class="img-fluid position-relative" alt="pesawat-service-img">
                  <h3 class="textService position-absolute top-50 start-50 translate-middle">Pesawat</h3>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="/reservasi-pesawat" class="btn btn-pesan mt-3 fw-bolder">
                    Pesan Sekarang
                  </a>
                </div>
              </div>
              <div class="col text-center">
                <div class="position-relative">
                  <img src="{{url('asset/front-end/image/kereta-service-img.png')}}" class="img-fluid" alt="kereta-service-img">
                  <h3 class="textService position-absolute top-50 start-50 translate-middle px-2">Kereta Api</h3>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="reservasi-kereta" class="btn btn-pesan mt-3 fw-bolder">
                    Pesan Sekarang
                  </a>
                </div>
              </div>
              <div class="col text-center">
                <div class="position-relative">
                  <img src="{{url('asset/front-end/image/hotel-service-img.png')}}" class="img-fluid" alt="hotel-service-img">
                  <h3 class="textService position-absolute top-50 start-50 translate-middle px-2">Hotel</h3>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="/reservasi-hotel" class="btn btn-pesan mt-3 fw-bolder">
                    Pesan Sekarang
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endauth

      <div id="about" class="container col-xxl-8 px-4 py-5">
        <h2 class="fw-bold mb-3 text-center">Tentang Windira Tour</h2>
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{url('asset/front-end/image/logo-perusahaan.jpg')}}" class="d-block mx-lg-auto img-fluid bg-transparent" alt="logo-perusahaan-img" width="700" height="570" loading="lazy">
          </div>
          <div class="col p-3">
            <p class="lead about-text fs-6">PT. Windira Cipta Mandiri terbangun berlokasi di Jl. K.H Achmad Dahlan No.71 Bandung yang berada di daerah Lengkong. Pimpinan dari perusahaan ini merupakan Ibu Indah Budiarti, memulai usaha ini dari sangat awal dikarenakan sebelumnya sudah pernah bekerja di bidang pariwisata yaitu perusahaan Jackal Holiday Bandung yang saat dulu berada di Jl. Lengkong Kecil, dengan giatnya akhirnya Ibu Indah Budiarti membuka perusahaan sendiri yaitu PT. Windira Cipta Mandiri. Perusahaan ini awal mulanya dikelola dengan Ibu Indah bersama Bapak Sandy dan Bapak Rafi, dengan berjalannya waktu pada tahun 1998 sampai saat ini akhirnya berdiri sendiri, karyawannya kini ada yang internal maupun eksternal pada perusahaan.</p>
          </div>
        </div>
      </div>

      
 @endsection