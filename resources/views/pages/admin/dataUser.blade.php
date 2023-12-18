@extends('layout.app')
@section('content')

<section id="insert">
      <div class="container insert">
        @if(Session::has('status') && Session::get('status') == 'success')
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <h1 class="titleInsert" align="center">Kelola data user</h1>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col" class="align-middle">No</th>
            <th scope="col" class="align-middle">Nama lengkap</th>
            <th scope="col" class="align-middle">Email</th>
            <th scope="col" class="align-middle">NIK</th>
            <th scope="col" class="align-middle">Tanggal lahir</th>
            <th scope="col" class="align-middle">Alamat</th>
            <th scope="col" class="align-middle">Jenis kelamin</th>
            <th scope="col" class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataUser as $key => $du)
            <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{$du -> nama_lengkap}}</td>
            <td>{{$du -> email}}</td>
            <td>{{$du -> nik}}</td>
            <td>{{$du -> tanggal_lahir}}</td>
            <td>{{$du -> alamat}}</td>
            <td>{{$du -> jenis_kelamin}}</td>
            <td class="align-middle">
                <a href="/data-user/edit/{{$du -> id}}"class="btn btn-warning btn-circle btn-sm button-edit mr-1 mb-1">edit user</a>
            </td>  
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </section>

@endsection