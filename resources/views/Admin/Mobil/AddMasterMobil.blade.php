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
<form action='/Master/Mobil/inputmobil' method='post' enctype="multipart/form-data">
{{ csrf_field() }}

  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Mobil</label>
    <input type="text" class="form-control"  name='nama_mobil' value='' required>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Warna</label>
    <input type="text" class="form-control"  name='warna' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nomor Polisi</label>
    <input type="text" class="form-control"  name='no_pol' value='' required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Kapasitas Penumpang</label>
    <input type="text" class="form-control"  name='kapasitas_penumpang' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Kapasitas Mesin</label>
    <input type="text" class="form-control"  name='kapasitas_mesin' value='' required>
  </div>

  <div class="form-group">

    <label for="exampleFormControlInput1">Tarif</label>
  
    <select name="id_tarif" id="id_tarif" onchange='kepatuhan();' class="form-control" required> 
    <option value="" selected></option>
 @foreach($mobil as $r)
        <option value="{{ $r->id_tarif }}">{{ $r->id_tarif }} - {{ $r->tahun_mobil }} - {{ $r->jenis_mobil }} - {{ $r->harga_sewa }}</option>
   
    <script>
  function kepatuhan()
  {
    var tarif=document.getElementById('id_tarif').value;
    if(tarif == "{{ $r->id_tarif }}")
  {
    
    document.getElementById('jenis_mobil').innerHTML='{{ $r->jenis_mobil }}';
    document.getElementById('jenis_mobil').value='{{ $r->jenis_mobil }}';

    document.getElementById('harga_sewa').innerHTML='{{ $r->harga_sewa }}';
    document.getElementById('harga_sewa').value='{{ $r->harga_sewa }}';
  }

  }
 </script>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Gambar Mobil</label>
    <input type="file" class="form-control"  name='gambar_mobil' id='gambar_mobil'  required>
  </div>
 <div>
 <br>
 <input class="btn btn-primary" type="submit" value="Input">
 <a href='/Admin/Mobil'><button type="button" class="btn btn-danger" >Kembali</button></a>
</div>
</form>
</div>
</div>
</div>
</div>
 </body>
 
</html>