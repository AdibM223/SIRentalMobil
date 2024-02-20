
@extends('layout.sidebaradminlayout');

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h3>Laporan Transaksi</h3>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
           <div style="margin: left 20px;"> Periode (Tanggal Ambil) : </div>
          <select name="search2" id="search2" class="form-control" onchange="change(this)" style="width:200px">
            <option value="All" selected>Semua</option>
            <option value="01" >Januari</option>
            <option value="02" >Februari</option>
            <option value="03" >Maret</option>
            <option value="04" >April</option>
            <option value="05" >Mei</option>
            <option value="06" >Juni</option>
            <option value="07" >Juli</option>
            <option value="08" >Agustus</option>
            <option value="09" >September</option>
            <option value="10" >Oktober</option>
            <option value="11" >November</option>
            <option value="12" >Desember</option>
            </select>
          <a href='/laptransaksi/cetaklaporan/01' id="redux1" target="__blank"><button  type="button" class="btn btn-primary" >Cetak Laporan</button></a>
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
      <th scope="col">Status</th>
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
              
    </tr>
@endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
<script type="text/javascript">

$('#search2').on('click',function(){
$value=$(this).val();

$.ajax({
        type : 'get',
        url : '{{URL::to('search2')}}',
        data:{'search2':$value},
        success:function(data){
              $('tbody').html(data);
         }
});
})

</script>
<script>

function change(){

  var pilihan = document.getElementById('search2').value;
  document.getElementById('redux1').href = '/laptransaksi/cetaklaporan/'+pilihan+'';
   
    }

</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection