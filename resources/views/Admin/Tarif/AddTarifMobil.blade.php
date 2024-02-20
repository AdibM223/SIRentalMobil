<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Tarif</title>
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
    <div class="card-header bg-primary text-white">INPUT DATA TARIF BARU</div>
    <div class="card-body">
<form action="{{route('actiontarif')}}" method='post' enctype="multipart/form-data">
{{ csrf_field() }}

 
    <div class="form-group">
    <label for="exampleFormControlInput1">Jenis Mobil</label>
    <input type="text" class="form-control"  name='jenis_mobil' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tahun Mobil</label>
    <input type="text" class="form-control"  name='tahun_mobil' value='' required>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Harga</label>
    <input type="text" class="form-control"  name='harga_sewa' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Waktu Sewa</label>
    <input type="text" class="form-control"  name='waktu_sewa' value='' required>
  </div> 
    <div>
    <br>
    <input class="btn btn-primary" type="submit" value="Input">
    <a href='/Admin/Tarif'><button type="button" class="btn btn-danger" >Kembali</button></a>
    </div>
</form>
</div>
</div>
</div>
</div>
 </body>
 
</html>