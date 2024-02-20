
@extends('layout.sidebaradminlayout');

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h1 class="text-center">Data Tarif</h1>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
<table class="table  table-striped-columns">
<a href='/Master/Tarif/Tambahtarif'><button type="button" class="btn btn-success"><i class="fas fa-plus"></i> Add Tarif</button></a>
  <thead>
    <tr>
      <th scope="col" class="text-center">ID</th>
      <th scope="col" class="text-center">Nama Mobil</th>
      <th scope="col" class="text-center">Tahun Mobil</th>
      <th scope="col" class="text-center">Harga Sewa</th>
      <th scope="col" class="text-center">Waktu Sewa</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <tr>
        @foreach($data as $r)
        <td class="text-center">{{ $r->id_tarif }}</td>
			  <td class="text-center">{{ $r->jenis_mobil }}</td>
			  <td class="text-center">{{ $r->tahun_mobil }}</td>
        <td class="text-center">{{ $r->harga_sewa }}</td>
        <td class="text-center">{{ $r->waktu_sewa }}</td>
			  <td class="text-center">
        <a href='/Master/Tarif/rubahtarif/{{ $r->id_tarif }}'><button type="button" class="btn btn-sm btn-warning fa fa-edit"></button></a>
        <a href='/Master/Tarif/hapustarif/{{ $r->id_tarif }}'><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
			  </td>
		</tr>
        @endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
@endsection