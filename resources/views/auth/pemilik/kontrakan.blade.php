@extends('layout.master')
@section('title','Kontrakan Pemilik')

@section('content')
<div class="container">
    <h4 class="text-center mt-4 mb-3" style="font-family:'Poppins', sans-serif;">Masukkan Kontrakan</h4>
    <center>
      <a class="btn btn-outline-primary btn-sm mb-3" href="{{url('kontrakan/tambah')}}">Daftarkan Kontrakanmu Sekarang</a>
    </center>
  </div>
<div class="container">
    <h5 cclass="text-left mb-3" style="font-family: 'Poppins', sans-serif;">Kontrakan Anda</h5>
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <!---Mulai----->
    @if($kontrakan)
    <div class="row">

        <div class="row">
            @forelse($kontrakan as $k)
            <div class="col-6 col-md-3 mb-3">
                <div style="width: 14,5rem;">
                    @if(strpos($k->foto,',') !== false)
                        <img src={{asset("img/".substr($k->foto,0,strpos($k->foto,',')))}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
                    @else
                        <img src={{asset("img/".$k->foto)}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
                    @endif
                    <a class="mt-2 ml-2 mb-1"  style="color: blue;"><small>{{$k->tipe}}</small></a>  
                    <h6 class="head-capt ml-2" style="font-family: 'Lato', sans-serif;">{{$k->nama}}</h6>
                    <div class=" hiden ml-2"  style="font-family: 'Lato', sans-serif;"><i class="fa fa-map ml-1 mr-1"></i><small>{{$k->lokasi}}</small></div>
                    <div class="hiden ml-2" style="font-family: 'Lato', sans-serif;"><small>{{$k->fasilitas}}</small></div>
                    <a class="text-left price-capt ml-2 mb-3" style="font-family: 'Lato', sans-serif;">Rp {{$k->harga}}/</a><a style="font-family: 'Lato', sans-serif;">Tahun</a><br>
                    <a href={{url('kontrakan/detail/'.$k->id)}} class=" text-center btn2 btn-block mb-1">Detail</a>
                </div>
            </div>
            @empty
            <div class="d-flex pagination align-items-center justify-content-center my-5">
                <div class="card">
                    <div class="card-head">
                        <img src="{{asset('img/download.jpg')}}" alt="sample image">
                    </div>
                    <div class="card-body">
                        <p>Anda belum memiliki data kontrakan</p>
                    </div>
                </div>
            </div>

            @endforelse
        </div>
        <div class="row">
            <div class="d-flex pagination align-items-center justify-content-center">
                {!!$kontrakan->render()!!}
            </div>
        </div>
        
    </div>
    @endif
    <!---Selesai----->
</div>

@endsection