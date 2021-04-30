@extends('layout.master')
@section('title','Home')

@section('content')
<div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
      <h1 class="text-center" style="font-family: 'Poppins', sans-serif;">SaCari</h1>
      <p class="text-content text-center" style="font-family: 'Poppins', sans-serif;" >Kamu bisa mencari kost hingga penginapan yang kamu inginkan.</p>
      <form action="{{url('cari')}}" method="get">
        <div class="input-group mb-3">
          <input type="text" name="cari" class="form-control form-sm" placeholder="Masukkan Alamat">
          <div class="input-group-append">
            <button class="btn btn-info" type="submit" id="search">Search</button>
          </div>
        </div>
      </form>
    </div>
</div>
<!---conten--->
<div class="container">
    @if(!empty(Auth::user()->id))
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
        @endif
    @endif
    <h5 class="text-left" style="font-family: 'Poppins', sans-serif;">Rekomendasi Kost</h5>
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    @if(!empty($kos))
    <div class="row">

        @forelse($kos as $ks)
        <div class="col-6 col-md-3 mb-3">
            <div style="width: 14,5rem;">
                @if(strpos($ks->foto,',') !== false)
                    <img src={{asset("img/".substr($ks->foto,0,strpos($ks->foto,',')))}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
                @else
                    <img src={{asset("img/".$ks->foto)}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
                @endif
                <a class="mt-2 mb-1 ml-2 mr-2" style="color: red;"><small> Sisa {{$ks->jumlah_kamar}} kamar</small></a>
                <a class="mt-2 mb-1"  style="color: blue;"><small> {{$ks->tipe}}</small></a>
                <h6 class="head-capt ml-2" style="font-family: 'Lato', sans-serif;">{{$ks->nama}}</h6>
                <div class=" hiden ml-2"  style="font-family: 'Lato', sans-serif;"><i class="fa fa-map ml-1 mr-1"></i><small>{{$ks->lokasi}}</small></div>
                <div class="hiden ml-2" style="font-family: 'Lato', sans-serif;"><small>{{$ks->fasilitas}}</small></div>
                <a class="text-left price-capt ml-2 mb-3" style="font-family: 'Lato', sans-serif;">Rp {{$ks->harga}}/</a><a style="font-family: 'Lato', sans-serif;">Bulan</a><br>
                <a href="{{url('kos/detail/'.$ks->id)}}" class=" text-center btn2 btn-block mb-1">Detail</a>
            </div>
        </div>
        @empty
        <div class="d-flex">
            <div class="card d-flex justify-content-center">
                <div class="card-head">
                    <h1 class="my-3 mx-3">Kosong</h1>
                </div>
                <div class="card-body">
                    <p>Kos belum ada</p>
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

    <h5 class="text-left mt-5" style="font-family: 'Poppins', sans-serif;">Rekomendasi Kontrakan</h5>
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    @if(!empty($kontrakan))
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
        <div class="d-flex">
            <div class="card d-flex justify-content-center">
                <div class="card-head">
                    <h1 class="my-3 mx-3">Kosong</h1>
                </div>
                <div class="card-body">
                    <p>Kontrakan belum ada</p>
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
    @endif

    <h5 class="text-left mt-5" style="font-family: 'Poppins', sans-serif;">Rekomendasi Penginapan</h5>
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    @if(!empty($penginapan))
    <div class="row">
        @forelse($penginapan as $p)
        <div class="col-6 col-md-3 mb-3">
            <div style="width: 14,5rem;">
                @if(strpos($p->foto,',') !== false)
                    <img src={{asset("img/".substr($p->foto,0,strpos($p->foto,',')))}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
                @else
                    <img src={{asset("img/".$p->foto)}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
                @endif
                <a class="mt-2 ml-2 mb-1"  style="color: blue;"><small>{{$p->tipe}}</small></a>  
                <h6 class="head-capt ml-2" style="font-family: 'Lato', sans-serif;">{{$p->nama}}</h6>
                <div class=" hiden ml-2"  style="font-family: 'Lato', sans-serif;"><i class="fa fa-map ml-1 mr-1"></i><small>{{$p->lokasi}}</small></div>
                <div class="hiden ml-2" style="font-family: 'Lato', sans-serif;"><small>{{$p->fasilitas}}</small></div>
                <a class="text-left price-capt ml-2 mb-3" style="font-family: 'Lato', sans-serif;">Rp {{$p->harga}}/</a><a style="font-family: 'Lato', sans-serif;">Malam</a><br>
                <a href={{url('penginapan/detail/'.$p->id)}} class=" text-center btn2 btn-block mb-1">Detail</a>
            </div>
        </div>
        @empty
        <div class="d-flex">
            <div class="card d-flex justify-content-center">
                <div class="card-head">
                    <h1 class="my-3 mx-3">Kosong</h1>
                </div>
                <div class="card-body">
                    <p>Penginapan belum ada</p>
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
    
    @endif

<div class="container">
    <h5 class="text-left mt-5" style="font-family: 'Poppins',sans-serif;">Area</h5>
    <div class="row">
        <div class="col-6 col-md-3 mb-3">
            <div style="width: 14,5rem;">
                <img src={{asset("img/um.png")}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
            </div>
        </div>

        <div class="col-6 col-md-3 mb-3">
            <div style="width: 14,5rem;">
                <img src={{asset("img/ub.jpg")}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">
            </div>
        </div>

        <div class="col-6 col-md-3 mb-3">
            <div style="width: 14,5rem;">
                <img src={{asset("img/umm.jpg")}} class="card-img-top img-fluid" style="width:250px; height:150px" alt="...">
            </div>
        </div>

        <div class="col-6 col-md-3 mb-3">
            <div style="width: 14,5rem;">
                <img src={{asset("img/unisma.jpg")}} class="card-img-top img-fluid" style="width:250px; height:150px" alt="...">
            </div>
        </div>
    </div>
</div>    
@endsection