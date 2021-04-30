@extends('layout.master')

@section('title','List Pesanan')

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
    ID Transaksi
  </th>
  <th>
    ID Penyewa
  </th>
  <th>
    ID Tempat Sewa
  </th>
  {{-- <th>
    Alamat
  </th> --}}
  <th>
    Biaya Sewa
  </th>
  <th>
    Durasi Sewa
  </th>
  <th>
    Status
  </th>
  <th>
    Accept
  </th>
  <th>
    Decline
  </th>
</tr>
@foreach($all_pesanan as $p)
<tr>
    <td>
    {{$p->id}}
    </td>
    <td>
    {{$p->id_pencari}}
    </td>
    <td>
    @if($p->id_kos != null)
    {{$p->id_kos}}
    @elseif($p->id_kontrakan != null)
    {{$p->id_kontrakan}}
    @elseif($p->id_penginapan != null)
    {{$p->id_penginapan}}
    @endif
    </td>
    <td>
    {{$p->biaya_sewa}}
    </td>
    <td>
    {{$p->mulai_sewa}}
    </td>
    <td>
    {{$p->status}}
    </td>
    @if($p->status =='pending')
    <td>
        <a href="{{url('admin/verifikasi/'.$p->id.'/accepted')}}"><i style="background: #2afa00;color: rgb(107, 107, 107)" class="card-icon-small material-icons">checked</i></a>
    </td>
    <td>
        <a href="{{url('admin/verifikasi/'.$p->id.'/rejected')}}"><i style="background: #fa0000;color: white" class="card-icon-small material-icons">cancel</i></a>
    </td>
    @else
    <td>
        --
    </td>
    <td>
        --
    </td>
    @endif
</tr>
@endforeach
</table>
</div>
@endsection