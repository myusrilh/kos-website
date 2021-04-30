@extends('layout.master')

@section('title','Penginapan')

@section('content')

<div class="container">
    <h4 class="text-center mt-4 mb-3" style="font-family:'Poppins', sans-serif;">Cari Penginapan</h4>
    <center>
      <form action="{{url('penginapan/cari')}}" method="get">
        <div class="input-group mb-3">
          <input type="text" name="cari" class="form-control form-sm" placeholder="Masukkan Alamat">
          <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit" id="search">Search</button>
          </div>
        </div>
      </form>
    <a href="" style="font-family: 'Poppins', sans-serif;" class="btn btn-sm btn-center btn-outline-primary mt-2 mb-4" data-toggle="modal" data-target="#tipe">Tipe Penginapan</a>
    <a href="" style="font-family: 'Poppins', sans-serif;" class="btn btn-sm btn-center btn-outline-primary mt-2 mb-4" data-toggle="modal" data-target="#harga">Harga Penginapan</a>
    </center>
  </div>
  <!---conten--->
  <div class="container">
    <h5 class="text-left mb-3" style="font-family: 'Poppins', sans-serif;">Penginapan Terpopuler</h5>
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    @if($show_all)
    <div class="row">
      @forelse($show_all as $s)
        <div class="col-6 col-md-3 mb-3">
            <div style="width: 14,5rem;">
                <img src={{asset("img/".$s->foto)}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">  
                <a class="mt-2 mb-1 ml-2"  style="color: blue;"><small>{{$s->tipe}}</small> </a>  
                <h6 class="head-capt ml-2" style="font-family: 'Lato', sans-serif;">{{$s->nama}}</h6>
                <div class=" hiden ml-2"  style="font-family: 'Lato', sans-serif;"><i class="fa fa-map ml-1 mr-1"></i><small>{{$s->lokasi}}</small></div>
                <div class="hiden ml-2" style="font-family: 'Lato', sans-serif;"><small>{{$s->fasilitas}}</small></div>
                <a class="text-left price-capt ml-2 mb-3" style="font-family: 'Lato', sans-serif;">Rp. {{$s->harga}}/</a><a style="font-family: 'Lato', sans-serif;">Malam</a><br>
                <a href={{url('penginapan/detail/'.$s->id)}} class=" text-center btn2 btn-block mb-1">Detail</a>
            </div>
        </div>
        @empty
        <div class="d-flex mb-5">
            <div class="card d-flex justify-content-center">
                <div class="card-head">
                    <h1 class="my-3 mx-3">
                      <img src="{{asset('img/download.jpg')}}" alt="">
                    </h1>
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
        {!!$show_all->render()!!}
      </div>
    </div>
  </div>
  @endif
  <!-- Modal -->
<div class="modal fade" id="tipe" tabindex="-1" aria-labelledby="tipe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tipe Penginapan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('penginapan/filter/tipe')}}" method="post">
        @csrf
        <div class="modal-body">
          <div class="checkbox"> <input type="checkbox" name="bebas" value="Bebas"> Bebas </div>
          <div class="checkbox"> <input type="checkbox" name="syariah" value="Syariah"> Syariah </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Cari</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="harga" tabindex="-1" aria-labelledby="harga" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Harga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="checkbox"> <input type="checkbox" value="" > Rp 0 - Rp 300,000 </div>
        <div class="checkbox"> <input type="checkbox" value="" > Rp 300,000 - Rp 600,000</div>
        <div class="checkbox"> <input type="checkbox" value="" > Rp 600,000 - Rp 900,000 </div>
        <div class="checkbox"> <input type="checkbox" value="" > Rp 900,000 - Rp 1,200,000</div>
        <div class="checkbox"> <input type="checkbox" value="" > Rp 1,200,000 - 1,500,000 </div>
        <div class="checkbox"> <input type="checkbox" value="" > Rp 1,500,000 -  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Cari</button>
      </div>
      </div>
    </div>
  </div>
</div>

@endsection