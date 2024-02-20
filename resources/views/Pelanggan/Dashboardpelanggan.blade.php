
@extends('layout.sidebarpelangganlayout');

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h3>DASHBOARD</h3>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->



@foreach ($mobil as $p)
<div class="card" style="width: 18rem; " >
  <img class="card-img-top" src="{{asset('storage/mobil/files/'.$p->gambar_mobil) }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$p->nama_mobil}}</h5>
    <p class="card-text">{{$p->harga_sewa}}</p>
    @if ( $p->status_sewa == 'tersedia')
    <a href="/Pelanggan/InputSewa/{{$p->id_mobil}}/{{ Auth::user()->id }}" class="btn btn-primary">Sewa Mobil</a>
    @else
    <button type="button" class="btn btn-danger" disabled>Tidak Tersedia</button> 
    @endif
</div>
</div>
<div style='margin-left:20px'></div>
@endforeach


</div></div></div></div>
<!-- </div> -->
@endsection