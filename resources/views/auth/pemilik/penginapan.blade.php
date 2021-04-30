@extends('layout.master')
@section('title','Penginapan Pemilik')

@section('content')
<div class="container">
    <h4 class="text-center mt-4 mb-3" style="font-family:'Poppins', sans-serif;">Masukkan Penginapan</h4>
    <center>
      <a class="btn btn-outline-primary btn-sm mb-3" href="{{url('penginapan/tambah')}}">Daftarkan Penginapanmu Sekarang</a>
    </center>
  </div>
<div class="container">
    <h5 cclass="text-left mb-3" style="font-family: 'Poppins', sans-serif;">Penginapan Anda</h5>
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <div class="row">
    <!---Mulai----->
    @if($penginapan)
    <div class="row">
      @forelse($penginapan as $p)
        <div class="col-6 col-md-3 mb-3">
            <div style="width: 14,5rem;">
              @if(strpos($p->foto,',') !== false)
                <img src={{asset("img/".substr($p->foto,0,strpos($p->foto,',')))}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
              @else
                <img src={{asset("img/".$p->foto)}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
              @endif
                <a class="mt-2 mb-1 ml-2"  style="color: blue;"><small>{{$p->tipe}}</small> </a>  
                <h6 class="head-capt ml-2" style="font-family: 'Lato', sans-serif;">{{$p->nama}}</h6>
                <div class=" hiden ml-2"  style="font-family: 'Lato', sans-serif;"><i class="fa fa-map ml-1 mr-1"></i><small>{{$p->lokasi}}</small></div>
                <div class="hiden ml-2" style="font-family: 'Lato', sans-serif;"><small>{{$p->fasilitas}}</small></div>
                <a class="text-left price-capt ml-2 mb-3" style="font-family: 'Lato', sans-serif;">Rp {{$p->harga}}/</a><a style="font-family: 'Lato', sans-serif;">Malam</a><br>
                <a href={{url('penginapan/detail/'.$p->id)}} class=" text-center btn2 btn-block mb-1">Detail</a>
            </div>
        </div>
        @empty
            <div class="d-flex pagination align-items-center justify-content-center my-5">
                <div class="card">
                    <div class="card-head">
                        <img src="{{asset('img/download.jpg')}}" alt="sample image">
                    </div>
                    <div class="card-body">
                        <p>Anda belum memiliki data penginapan</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    <div class="row">
      <div class="d-flex pagination align-items-center justify-content-center">
        {!!$penginapan->render()!!}
      </div>
    </div>
  </div>
  @endif
    
    <!---Selesai----->
    </div>
    </div>

@endsection