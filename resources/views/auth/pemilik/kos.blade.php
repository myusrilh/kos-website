@extends('layout.master')
@section('title','Kos Pemilik')

@section('content')
<div class="container">
<h4 class="text-center mt-4 mb-3" style="font-family:'Poppins', sans-serif;">Masukkan Kost</h4>
<center>
    <a class="btn btn-outline-primary btn-sm mb-3" href="{{url('kos/tambah')}}">Daftarkan Kosanmu Sekarang</a>
</center>
</div>
<div class="container">
    <h5 cclass="text-left mb-3" style="font-family: 'Poppins', sans-serif;">Kosan Anda</h5>
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <div class="row">
    <!---Mulai----->
    @if($kos)
    <div class="row">

        @forelse($kos as $ks)
        <div class="col-6 col-md-3 mb-3">
            <div style="width: 14,5rem;">
                @if(strpos($ks->foto,',') !== false)
                    <img src={{asset("img/".substr($ks->foto,0,strpos($ks->foto,',')))}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
                @else
                    <img src={{asset("img/".$ks->foto)}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
                @endif
                <a class="mt-2 mb-1 ml-2 mr-2" style="color: red;"><small> Sisa {{$ks->jumlah_kamar}}</small></a>
                <a class="mt-2 mb-1"  style="color: blue;"><small> {{$ks->tipe}}</small></a>
                <h6 class="head-capt ml-2" style="font-family: 'Lato', sans-serif;">{{$ks->nama}}</h6>
                <div class=" hiden ml-2"  style="font-family: 'Lato', sans-serif;"><i class="fa fa-map ml-1 mr-1"></i><small>{{$ks->lokasi}}</small></div>
                <div class="hiden ml-2" style="font-family: 'Lato', sans-serif;"><small>{{$ks->fasilitas}}</small></div>
                <a class="text-left price-capt ml-2 mb-3" style="font-family: 'Lato', sans-serif;">Rp {{$ks->harga}}/</a><a style="font-family: 'Lato', sans-serif;">Bulan</a><br>
                <a href="{{url('kos/detail/'.$ks->id)}}" class=" text-center btn2 btn-block mb-1">Detail</a>
            </div>
        </div>
        @empty
            <div class="d-flex pagination align-items-center justify-content-center my-5">
                <div class="card">
                    <div class="card-head">
                        <img src="{{asset('img/download.jpg')}}" alt="sample image">
                    </div>
                    <div class="card-body">
                        <p>Anda belum memiliki data kosan</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    <div class="row">
        <div class="d-flex pagination align-items-center justify-content-center">
            {!!$kos->render()!!}
        </div>
    </div>
    @endif
    
    <!---Selesai----->
    </div>
    </div>

@endsection