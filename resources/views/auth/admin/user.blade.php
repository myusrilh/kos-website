@extends('layout.master')

@section('title','List User')

@section('content')
<div class="container">
<div class="container jumbotron jumbotron-fluid bg-light">
    <div class="container">
      <h1 class="text-center" style="font-family: 'Poppins', sans-serif;">SaCari</h1>
      <p class="text-content text-center" style="font-family: 'Poppins', sans-serif;" >Kamu bisa mencari kost hingga penginapan yang kamu inginkan.</p>
    </div>
</div>
<div class="row">
  @if (session('sukses'))
  <div class="alert alert-success">
  {{session('sukses')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
      </button>
  </div>
  @endif
  @if (session('failed'))
  <div class="alert alert-danger">
  {{session('failed')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
      </button>
  </div>
  @endif
</div>
<table class="table my-5 mx-5" >
<tr>
  <th>
    ID
  </th>
  <th>
    Nama
  </th>
  <th>
    Alamat
  </th>
  <th>
    Nomor Telepon
  </th>
  <th>
    Email
  </th>
  <th>
    Level
  </th>
  <th>
    Action
  </th>
</tr>
@foreach($all_user as $user)
<tr>
  <td>
    {{$user->id}}
  </td>
  <td>
    {{$user->nama}}
  </td>
  <td>
    {{$user->alamat}}
  </td>
  <td>
    {{$user->nomor}}
  </td>
  <td>
    {{$user->email}}
  </td>
  <td>
    {{$user->level}}
  </td>
  <td>
    <a href="{{url('admin/edit/'.$user->id)}}"><i style="background: #fae900;color: rgb(107, 107, 107)" class="card-icon-small material-icons">edit</i></a>
    <a href="{{url('admin/delete/'.$user->id)}}"><i style="background: #fa0000;color: white" class="card-icon-small material-icons">delete</i></a>
  </td>
</tr>
@endforeach
</table>
</div>
@endsection