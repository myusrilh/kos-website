@extends('layout.master')

@section('title','List Transaksi')

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
<h4 class="mt-4">Transaksi</h4>
<hr/>
<p><b>Keterangan</b></p>
<ul>
    <li>
        <span><i class="material-icons">hourglass_empty</i> : Pending</span>
    </li>
    <li>
        <span><i style="color: rgb(0, 255, 13)" class="material-icons">check_circle</i> : Accepted</span>
    </li>
    <li>
        <span><i style="color: red" class="material-icons">cancel</i> : Rejected</span>
    </li>
</ul>
<table class="table mb-5 mx-5" >
    <tr>
        <th>
            ID
        </th>
        <th>
            ID Tempat Sewa
        </th>
        <th>
            Biaya Sewa
        </th>
        <th>
            Status
        </th>
        <th>
            Durasi
        </th>
    </tr>
    @forelse($transaksi as $t)
    <tr>
        <td>
            {{$t->id}}
        </td>
        <td>
            @if($t->id_kos != null && $t->id_kontrakan == null && $t->id_penginapan == null)
                {{$t->id_kos}} (Kos)
            @elseif($t->id_kos == null && $t->id_kontrakan != null && $t->id_penginapan == null)
                {{$t->id_kontrakan}} (Kontrakan)
            @elseif($t->id_kos == null && $t->id_kontrakan == null && $t->id_penginapan != null)
                {{$t->id_penginapan}} (Penginapan)
            @endif
        </td>
        <td>
            {{$t->biaya_sewa}}
        </td>
        <td>
            @if($t->status == 'pending')
                <span><i class="material-icons">hourglass_empty</i></span>
            @elseif($t->status == 'accepted')
                <span><i style="color: rgb(0, 255, 13)" class="material-icons">check_circle</i></span>
            @elseif($t->status == 'rejected')
                <span><i style="color: red" class="material-icons">cancel</i></span>
            @endif
        </td>
        <td>
            @if($t->id_kos != null && $t->id_kontrakan == null && $t->id_penginapan == null)
                {{$durasi = Carbon\Carbon::parse($t->mulai_sewa)->diffInMonths($t->akhir_sewa)}} Bulan
            @elseif($t->id_kos == null && $t->id_kontrakan != null && $t->id_penginapan == null)
                {{$durasi = Carbon\Carbon::parse($t->mulai_sewa)->diffInYears($t->akhir_sewa)}} Tahun
            @elseif($t->id_kos == null && $t->id_kontrakan == null && $t->id_penginapan != null)
                {{$durasi = Carbon\Carbon::parse($t->mulai_sewa)->diffInDays($t->akhir_sewa)}} Malam
            @endif
        </td>
    </tr>
    @empty
    <tr class="d-flex align-items-center justify-content-center">
        <td colspan="8">
            <h3>Belum ada transaksi</h3>
        </td>
    </tr>
    @endforelse
</table>
</div>
@endsection