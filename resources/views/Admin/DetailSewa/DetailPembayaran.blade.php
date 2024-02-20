
@extends('layout.sidebaradminlayout');

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h3>Detail Pembayaran</h3>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
<table class="table  table-striped-columns">

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mobil </th>
      <th scope="col">Plat Nomor</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Tanggal Pembayaran</th>
      <th scope="col">Total Biaya</th>
      <th scope="col">Status Pembayaran</th>
      <th scope="col">Konfirmasi Status </th>
    </tr>
  </thead>
  <tbody>
  <tr>
        @foreach($pembayaran as $r)
        <td>{{ $r->id_pembayaran }}</td>
			  <td>{{ $r->nama_mobil }}</td>
        <td>{{ $r->no_pol }}</td>
              <td>{{ $r->name }}</td>
              <td>{{ $r->tgl_pembayaran }}</td>
              <td>{{ $r->total }}</td>
              <td>
              @if ( $r->status_pembayaran == '2')
              <button type="button" class="btn btn-primary" disabled>Lunas</button>
              @elseif ($r->status_pembayaran == '1')
              <button type="button" class="btn btn-danger" disabled>Belum Lunas</button>
              @endif

              </td>
              @if ($r->status_pembayaran == '1')
              <td> <a href="/Pelanggan/tambahdetailbayar/{{$r->id_pembayaran }}"><button type="button" class='btn btn-primary'>Konfirmasi Pembayaran</button></a></td>
              @endif
		</tr>
        @endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
@endsection