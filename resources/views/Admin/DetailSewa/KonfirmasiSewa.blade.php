@extends('layout.sidebaradminlayout')

@section('content')
<div class="content-wrapper">
  <div class="container">
    <div class="card">
      <div class="card-header bg-primary text-white">KONFIRMASI PENYEWAAN</div>
      <div class="card-body">
        <!-- Form untuk KONFIRMASI dan BATAL DETAIL -->
        <form id="konfirmasiForm" action='/admin/tambahdetail' method='post'>
          {{ csrf_field() }}
          @foreach($updatesewa as $r)
  <!-- Input untuk KONFIRMASI dan BATAL DETAIL -->
  <input type="text" class="form-control" name='id_sewa' value='{{$r->id_sewa}}' required readonly>
  <input type="hidden" class="form-control" name='id_mobil' value='{{$r->id_mobil}}' required readonly>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Mobil</label>
    <input type="text" class="form-control" name='nama_mobil' value='{{$r->nama_mobil}}' required readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Warna</label>
    <input type="text" class="form-control" name='warna' value='{{$r->warna}}' required readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nomor Polisi</label>
    <input type="text" class="form-control" name='no_pol' value='{{$r->no_pol}}' required readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Jenis Mobil</label>
    <input type="text" class="form-control" name='jenis_mobil' value='{{$r->jenis_mobil}}' required readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Jumlah Penumpang</label>
    <input type="text" class="form-control" name='kapasitas_penumpang' value='{{$r->kapasitas_penumpang}}' required readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Ambil</label>
    <input type="date" class="form-control" name='tgl_ambil' value='{{$r->tgl_ambil}}' readonly required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Kembali</label>
    <input type="date" class="form-control" name='tgl_kembali' value='{{$r->tgl_kembali}}' readonly required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Total Sewa</label>
    <input type="text" class="form-control" name='total_bayar' value='{{$r->total_sewa}}' readonly required>
  </div>
@endforeach
          <div>
            <br>
            <input class="btn btn-primary" type="submit" value="KONFIRMASI">
            <button class="btn btn-danger" id="batalDetailBtn" type="button">BATAL SEWA</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    // Mengubah aksi formulir saat tombol BATAL DETAIL diklik
    $('#batalDetailBtn').on('click', function() {
      $('#konfirmasiForm').attr('action', '/admin/bataldetail');
      // Mengirimkan formulir setelah mengubah aksi
      $('#konfirmasiForm').submit();
    });
  });
</script>
@endsection