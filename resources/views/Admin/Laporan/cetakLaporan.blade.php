<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LAPORAN TRANSAKSI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
</head>
<center>
<body class="A4 potrait">
    <section class="sheet padding-10mm">
        <h1>LAPORAN TRANSAKSI PENYEWAAN CV. INDORENTAL </h1>
  
        <table class="table">
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
    </section>
</body>
</center>

<script type="text/javascript">

    
    window.print();
</script>
</html>