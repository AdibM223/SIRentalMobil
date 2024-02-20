
@extends('layout.sidebaradminlayout');

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h3>Detail Penyewaan</h3>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
<table class="table  table-striped-columns">

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mobil </th>
      <th scope="col">Nomor Plat</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">NIK</th>
      <th scope="col">Tanggal Ambil</th>
      <th scope="col">Tanggal Kembali</th>
      
      <th scope="col">Status Penyewaan</th>
      <th scope="col">Detail Penyewaan</th>
    </tr>
  </thead>
  <tbody>
  <tr>
        @foreach($penyewaan as  $no => $r)
        <td>{{ $no+1 }}</td>
			  <td>{{ $r->nama_mobil }}</td>
        <td>{{ $r->no_pol }}</td>
              <td>{{ $r->name }}</td>
              <td>{{ $r->nik }}</td>   
              <td>{{ $r->tgl_ambil }}</td>
              <td>{{ $r->tgl_kembali }}</td>
              <td>{{ $r->tgl_kembali }}</td>
              <td>

              @if ( $r->status_penyewaan == '2')
              <button type="button" class="btn btn-primary" disabled>Disewa</button>
              @elseif ($r->status_penyewaan == '1')
              <button type="button" class="btn btn-warning" disabled>Pending</button>
              @elseif ($r->status_penyewaan == '3')
              <button type="button" class="btn btn-danger" disabled>Dibatalkan</button>
              @endif
            </td>
            @if ($r->status_penyewaan == '1')
              <td> <a href="/Pelanggan/tambahdetailsewa/{{$r->id_sewa }}"><button type="button" class='btn btn-primary'>Terima Sewa</button></a></td>
            @elseif ($r->status_penyewaan == '2')
              
            @elseif ($r->status_penyewaan == '3')
            @endif  
          </tr>
        @endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
@endsection