
@extends('layout.sidebaradminlayout');

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h3>Detail Pengembalian</h3>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
<table class="table  table-striped-columns">

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIK </th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Nama Mobil</th>
      <th scope="col">Plat Nomor</th>
      <th scope="col">Tanggal Ambil</th>
      <th scope="col">Tanggal Kembali</th>
      <th scope="col">Denda</th>
      <th scope="col">Total Biaya</th>
      <th scope="col">Status Pembayaran</th>
      <th scope="col">Konfirmasi Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($pengembalian as $r)
  <tr>
        <td>{{ $r->id_pengembalian }}</td>
			  <td>{{ $r->nik }}</td>
              <td>{{ $r->name }}</td>
              <td>{{ $r->nama_mobil }}</td>
              <td>{{ $r->no_pol }}</td>
              <td>{{ $r->tgl_ambil }}</td>
              <td>{{ $r->tgl_kembali }}</td>
              <td>{{ $r->denda }}</td>
              <td>{{ $r->total_bayar }}</td>
              <td>
              @if ( $r->status_pengembalian == '2')
              <button type="button" class="btn btn-primary" disabled>Dikembalikan</button>
              @elseif ($r->status_pengembalian == '1')
              <button type="button" class="btn btn-danger" disabled>Belum Dikembalikan</button>
              @endif
              </td>
              @if ($r->status_pengembalian == '1')
              <td> <a href="/Pelanggan/tambahdetailkembali/{{$r->id_pengembalian }}"><button type="button" class='btn btn-primary'>Konfirmasi Pengembalian</button></a></td>
              @endif
            </tr>
@endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
@endsection