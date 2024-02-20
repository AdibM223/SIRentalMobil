
@extends('layout.sidebaradminlayout');

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6"> -->
<table class="table  table-striped-columns">
<!-- <a href='/Master/Pelanggan/tambahpelanggan'><button type="button" class="btn btn-success" >Add New</button></a> -->
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama </th>
      
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <tr>
        @foreach($admin as $r)
        <td>{{ $r->id }}</td>
			  <td>{{ $r->name }}</td>
        <td>{{ $r->email }}</td>
        <td>{{ $r->password }}</td>
			  <td>
        
        <a href='/Master/Admin/hapusadmin/{{ $r->id }}'><button type="button" class="btn btn-danger" >Delete</button></a>
			  </td>
		</tr>
        @endforeach
  </tbody>
</table>
</div></div></div></div>
<!-- </div> -->
@endsection