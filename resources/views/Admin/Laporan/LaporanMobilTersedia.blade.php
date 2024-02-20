
@extends('layout.sidebaradminlayout');

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h3>Laporan Mobil Tersedia</h3>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
            Status Mobil : 
            <select name="search" id="search" class="form-control" onchange="change(this)" style="width:200px"> 
            <option value="All" selected>Semua</option>
              <option value="tersedia" >Tersedia</option>
              <option value="disewa">Disewa</option>
            </select>
            <!-- <input type="text" id="search" class="form-control"> -->
            <a href='/laptransaksi/cetaklaporanmobil/tersedia' target="__blank" id="redux1"><button  type="button" class="btn btn-primary" >Cetak Laporan</button></a>
          <table class="table  table-striped-columns">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mobil </th>
      <th scope="col">Warna</th>
      <th scope="col">Tahun Mobil</th>
      <th scope="col">Kapasitas Penumpang</th>
      <th scope="col">Harga Sewa/Hari</th>
      <th scope="col">Plat Nomor</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($mobil as $r)
  <tr>
        <td>{{ $r->id_mobil }}</td>
			  <td>{{ $r->nama_mobil }}</td>
              <td>{{ $r->warna }}</td>
              <td>{{ $r->tahun_mobil }}</td>
              <td>{{ $r->kapasitas_penumpang }}</td>
              <td>{{ $r->harga_sewa }}</td>
              <td>{{ $r->no_pol }}</td>
              <td>{{ $r->status_sewa }}</td>
              
              
    </tr>
@endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
<script type="text/javascript">

$('#search').on('click',function(){
$value=$(this).val();

$.ajax({
        type : 'get',
        url : '{{URL::to('search')}}',
        data:{'search':$value},
        success:function(data){
              $('tbody').html(data);
         }
});
})

</script>
<script>

function change(){

  var pilihan = document.getElementById('search').value;
      if(pilihan == 'tersedia')
      {
        document.getElementById('redux1').href = '/laptransaksi/cetaklaporanmobil/tersedia';
      }
      else if(pilihan == 'All')
      {
        document.getElementById('redux1').href = '/laptransaksi/cetaklaporanmobil/All';
      }
      else{
        document.getElementById('redux1').href = '/laptransaksi/cetaklaporanmobil/disewa';
      }


    }

</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection