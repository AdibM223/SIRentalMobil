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
    <div class="card-header bg-primary text-white">REGISTRASI PELANGGAN</div>
    <div class="card-body">
<form action='/Master/Pelanggan/inputpelanggan' method='post'>
{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Pelanggan</label>
    <input type="text" class="form-control"  name='nama' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">NIK Pelanggan</label>
    <input type="number" class="form-control"  name='nik' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="text" class="form-control"  name='email' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Password</label>
    <input type="password" class="form-control"  name='password' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Alamat</label>
    <input type="text" class="form-control"  name='alamat' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Lahir</label>
    <input type="date" class="form-control"  name='tgl_lahir' value='' required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">No HP</label>
    <input type="text" class="form-control"  name='no_hp' value='' required>
  </div>
 <div>
 <br>
 <input class="btn btn-primary" type="submit" value="Registrasi">
 <a href='/Admin/Pelanggan'><button type="button" class="btn btn-danger" >Kembali</button></a>
</div>
</form>
</div>
</div>
</div>
</div>
 </body>
 
</html>