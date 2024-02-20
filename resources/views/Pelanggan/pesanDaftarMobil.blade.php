<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<body>
@if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
          </ul>
      </div>
@endif
<div class="container">
  <div class="card">
    <div class="card-header bg-primary text-white">INPUT DATA MOBIL BARU</div>
    <div class="card-body">
<form action='/Pelanggan/Inputpenyewaanmobil' method='post'>
{{ csrf_field() }}
<input type="hidden" name='id_pelanggan' value='{{Auth::user()->id}}'>
@foreach ($langganan as $p)
<div class="form-group">
    <label for="exampleFormControlInput1">NIK</label>
    <input type="text" class="form-control"  name='nik' value='{{$p->nik}}' required readonly>
  </div>
@endforeach
@foreach($mobil as $r)
<input type="hidden" class="form-control"  name='id_mobil' value='{{$r->id_mobil}}' required readonly>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Mobil</label>
    <input type="text" class="form-control"  name='nama_mobil' value='{{$r->nama_mobil}}' required readonly>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Warna</label>
    <input type="text" class="form-control"  name='warna' value='{{$r->warna}}' required readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nomor Polisi</label>
    <input type="text" class="form-control"  name='no_pol' value='{{$r->no_pol}}' required readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Jenis Mobil</label>
    <input type="text" class="form-control"  name='jenis_mobil' id='jenis_mobil' value='{{$r->jenis_mobil}}' readonly required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Jumlah Penumpang</label>
    <input type="text" class="form-control"  name='kapasitas_penumpang' value='{{$r->kapasitas_penumpang}}' required readonly>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Ambil</label>
    <input type="date" class="form-control"  name='tgl_ambil' id='tgl_ambil'  required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Kembali</label>
    <input type="date" class="form-control"  name='tgl_kembali' id='tgl_kembali'   required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Harga Sewa</label>
    <table width='100%'>
   
    <tr>
      <td>
      <input type="number" class="form-control"  width='40%' name='harga_sewa' id='harga_sewa' value='{{$r->harga_sewa}}' readonly required>
      </td>
      <td>
      <input type="number" class="form-control"  width='40%' name='total_sewa' id='total_sewa' value='' readonly required>
      </td>
      <td>
      <input type="button" onclick='hitungjumlah();'  width='20%' class="btn btn-warning" value='Hitung'>
      </td>
    </tr>
      
   
   
    </table>
  
  </div>
  @endforeach  
 <div>
 <br>
 <input class="btn btn-primary" type="submit" value="Input">
 <a href='/Pelanggan/daftarmobil'><button type="button" class="btn btn-danger" >Kembali</button></a>
</div>
</form>
</div>
</div>
</div>
</div>
 </body>
 <script>
    function hitungjumlah() {
      var date1 = new Date(document.getElementById('tgl_ambil').value);
      var date2 = new Date(document.getElementById('tgl_kembali').value);
      var harga = document.getElementById('harga_sewa').value;

      var selisih_date = date2 - date1;

      var selisih_date_dlm_hari = selisih_date / (1000*3600*24)

      var total_bayar = harga * selisih_date_dlm_hari;

      document.getElementById('total_sewa').value = total_bayar;
      document.getElementById('total_sewa').innerHTML = total_bayar;
}
  </script>
</html>