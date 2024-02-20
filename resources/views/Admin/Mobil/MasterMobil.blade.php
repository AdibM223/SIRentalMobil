
@extends('layout.sidebaradminlayout');

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h1 class="text-center">Data Mobil</h1>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
<table class="table  table-striped-columns">
<a href='/Master/Mobil/Tambahmobil'><button type="button" class="btn btn-success" >Add New</button></a>
  <thead>
    <tr>
      <th scope="col" class="text-center">ID</th>
      <th scope="col" class="text-center">Nama Mobil </th>
      <th scope="col" class="text-center">Tahun Mobil </th>
      <th scope="col" class="text-center">Warna</th>
      <th scope="col" class="text-center">No Pol</th>
      <th scope="col" class="text-center">Kapasitas Penumpang</th>
      <th scope="col" class="text-center">Kapasitas Mesin</th>
      <th scope="col" class="text-center">Harga Sewa</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <tr>
        @foreach($mobil as $r)
        <td class="text-center">{{ $r->id_mobil }}</td>
			  <td class="text-center">{{ $r->nama_mobil }}</td>
        <td class="text-center">{{ $r->tahun_mobil }}</td>
        <td class="text-center">{{ $r->warna }}</td>
        <td class="text-center">{{ $r->no_pol }}</td>
        <td class="text-center">{{ $r->kapasitas_penumpang }}</td>
        <td class="text-center">{{ $r->kapasitas_mesin }}</td>
        <td class="text-center">{{ $r->harga_sewa }}</td>
			  <td class="text-center">
        <a href='/Master/Mobil/rubahmobil/{{$r->id_mobil}}'><button type="button" class="btn btn-sm btn-warning fa fa-edit"></button></a>
        <a href='/Master/Mobil/hapusmobil/{{ $r->id_mobil }}'><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
			  </td>
		</tr>
        @endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
@endsection