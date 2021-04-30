@extends('layout.master')

@section('title','Home Pemilik')

@section('content')
<div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
      <h1 class="text-center" style="font-family: 'Poppins', sans-serif;">SaCari</h1>
      <p class="text-content text-center" style="font-family: 'Poppins', sans-serif;" >Kamu bisa mencari kost hingga penginapan yang kamu inginkan.</p>
      {{-- <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukkan Alamat">
          <div class="input-group-append">
            <button class="btn btn-info" id="search">Search</button>
          </div>
      </div> --}}
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
</div>
    <div class="row my-5">
      <div class="row my-4">
        <div class="my-5 d-flex justify-content-center">
          @if(strpos($user->nama,' '))
            <h1>Selamat datang {{substr($user->nama,0,strpos($user->nama,' '))}}!</h1>
          @else
            <h1>Selamat datang {{$user->nama}}!</h1>
          @endif
        </div>
      </div>
      <div class="row my-5 d-flex justify-content-center">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div style="background: linear-gradient(60deg, #00f55e, #e5f503);" class="card-icon">
                <i class="material-icons">hotel</i>
              </div>
              <p class="card-category" style="font-size:20px;">Kosan Anda</p>
              <h3 style="color:#636b6f;  text-align: center;">{{count($kos)}}</h3>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a style="font-size:15px; text-align:center;"  href="{{url('pemilik/kos/'.Auth::user()->id)}}">More Info</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div style="background: linear-gradient(60deg, #0ad7fc, #0350f5);" class="card-icon">
                <i class="material-icons">house</i>
              </div>
              <p class="card-category" style="font-size:20px;">Kontrakan Anda</p>
              <h3 style="color:#636b6f;  text-align: center;">{{count($kontrakan)}}</h3>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a style="font-size:15px; text-align:center;"  href="{{url('pemilik/kontrakan/'.Auth::user()->id)}}">More Info</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div style="background: linear-gradient(60deg, #f500e1, #f50360);" class="card-icon">
                <i class="material-icons">apartment</i>
              </div>
              <p class="card-category" style="font-size:20px;">Penginapan Anda</p>
              <h3 style="color:#636b6f;  text-align: center;">{{count($penginapan)}}</h3>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a style="font-size:15px; text-align:center;"  href="{{url('pemilik/penginapan/'.Auth::user()->id)}}">More Info</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection