<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LAPORAN KETERSEDIAAN MOBIL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
</head>
<center>
<body class="A4">
    <section class="sheet padding-10mm">
        <h1>LAPORAN KETERSEDIAAN MOBIL CV. INDORENTAL </h1>
  
        <table class="table">
        <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Nama Mobil </th>
      <th scope="col">Warna</th>
      <th scope="col">Tahun Mobil</th>
      <th scope="col">Kapasitas Penumpang</th>
      <th scope="col">Harga Sewa/Hari</th>
      <th scope="col">Plat Nomor</th>
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