
@extends('layout.sidebaradminlayout');

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
<table class="table  table-striped-columns">
<!-- <a href='/Master/Pelanggan/tambahpelanggan'><button type="button" class="btn btn-success" >Add New</button></a> -->
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama </th>
      <th scope="col">NIK</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Alamat</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">No HP</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <tr>
        @foreach($pelanggan as $r)
        <td>{{ $r->id_pelanggan }}</td>
			  <td>{{ $r->nama }}</td>
			  <td>{{ $r->nik }}</td>
        <td>{{ $r->email }}</td>
        <td>{{ $r->password }}</td>
        <td>{{ $r->alamat }}</td>
        <td>{{ $r->tgl_lahir }}</td>
        <td>{{ $r->no_hp }}</td>
			  <td>
        <!-- <a href='/Master/Pelanggan/rubahpelanggan/{{$r->id_pelanggan}}'><button type="button" class="btn btn-warning" >Update</button></a> -->
        <a href='/Master/Pelanggan/hapuspelanggan/{{ $r->id_pelanggan }}'><button type="button" class="btn btn-danger" >Delete</button></a>
			  </td>
		</tr>
        @endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
@endsection