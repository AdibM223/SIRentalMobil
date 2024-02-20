

@extends('layout.sidebaradminlayout');

@section('content')
<div class="content-wrapper">
<div class="container">
  <div class="card">
    <div class="card-header bg-primary text-white">KONFIRMASI PENYEWAAN</div>
    <div class="card-body">
<form action='/admin/tambahdetailbayar' method='post'>
{{ csrf_field() }}
@foreach($updatesewa as $r)
<input type="text" class="form-control"  name='id_pembayaran' value='{{$r->id_pembayaran}}' required readonly>



@endforeach  
 <div>
 <br>
 <input class="btn btn-primary" type="submit" value="KONFIRMASI">
 <a href='/Admin/Pembayaran'><button type="button" class="btn btn-danger" >Kembali</button></a>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection