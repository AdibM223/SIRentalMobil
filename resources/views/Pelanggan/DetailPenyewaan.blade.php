
@extends('layout.sidebarpelangganlayout');

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h3>Penyewaan</h3>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
<table class="table  table-striped-columns">

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mobil </th>
      <th scope="col">Tanggal Ambil</th>
      <th scope="col">Tanggal Kembali</th>
      <th scope="col">Total Sewa</th>
      <th scope="col">Status Penyewaan</th>
    </tr>
  </thead>
  <tbody>
  <tr>
        @foreach($penyewaan as $r)
              <td>{{ $r->id_sewa }}</td>
			        <td>{{ $r->nama_mobil }}</td>
              <td>{{ $r->tgl_ambil }}</td>
              <td>{{ $r->tgl_kembali }}</td>
              <td>{{ $r->total_sewa }}</td>
              <td>
              @if ( $r->status_penyewaan == '2')
              <button type="button" class="btn btn-primary" disabled>Sudah di ACC</button>
              @elseif ($r->status_penyewaan == '1')
              <button type="button" class="btn btn-warning" disabled>Pending</button>
              @elseif ($r->status_penyewaan == '3')
              <button type="button" class="btn btn-danger" disabled>Dibatalkan</button>              
              @endif
              </td>
			  
		</tr>
        @endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
@endsection