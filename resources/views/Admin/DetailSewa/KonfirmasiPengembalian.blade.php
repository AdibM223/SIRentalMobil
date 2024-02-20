

@extends('layout.sidebaradminlayout');

@section('content')
<div class="content-wrapper">
<div class="container">
  <div class="card">
    <div class="card-header bg-primary text-white">KONFIRMASI PENYEWAAN</div>
    <div class="card-body">
<form action='/admin/tambahdetailkembali' method='post'>
{{ csrf_field() }}
@foreach($mobil as $r)
<input type="hidden" name='id_mobil' value='{{$r->id_mobil}}' >
@endforeach
@foreach($updatesewa as $r)
<input type="text" class="form-control"  name='id_pengembalian' value='{{$r->id_pengembalian}}' required readonly>
<div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Rencana Pengembalian</label>
    <input type="date" class="form-control"  name='tgl_kembali' id='tgl_kembali'  value="{{$r->tgl_kembali}}" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Realisasi Pengembalian</label>
    <input type="date" class="form-control"  name='kembalikan' id='kembalikan'   required>
  </div>

  <div class="form-group">
    
    <table width='100%'>
    <tr>
      <td>
      <label for="exampleFormControlInput1">Total </label>
      </td>
      <td>
      <label for="exampleFormControlInput1">Denda</label>
      </td>
    </tr>
    <tr>
      <td>
      <input type="number" class="form-control"  width='40%' name='total_bayar' id='total_bayar' value='{{$r->total_bayar}}' readonly required>
      </td>
      @endforeach  
      <td>
      <input type="number" class="form-control"  width='40%' name='denda' id='denda' value='' readonly required>
     
      </td>
      <td>
      <input type="button" onclick='hitungjumlah();'  width='20%' class="btn btn-warning" value='Hitung'>
      </td>
    </tr>
</table>
 <div>
 <br>
 <input class="btn btn-primary" type="submit" value="KONFIRMASI">
 <a href='/Admin/Pengembalian'><button type="button" class="btn btn-danger" >Kembali</button></a>
</div>
</form>
</div>
</div>
</div>
</div>
<script>
    function hitungjumlah() {
      var date1 = new Date(document.getElementById('tgl_kembali').value);
      var date2 = new Date(document.getElementById('kembalikan').value);
      var harga = document.getElementById('total_bayar').value;
      var har = parseInt(harga);
      var selisih_date = date2 - date1;

      var selisih_date_dlm_hari = selisih_date / (1000*3600*24)

      var denda = (50000*selisih_date_dlm_hari);
      var tot = har + (50000*selisih_date_dlm_hari)

      document.getElementById('total_bayar').value = tot;
      document.getElementById('total_bayar').innerHTML = tot;
      document.getElementById('denda').value = denda;
      document.getElementById('denda').innerHTML = denda;
}
  </script>
@endsection