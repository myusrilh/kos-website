@extends('layout.master')

@section('title','Kos')

@section('content')

<div class="container">
  @if (session('sukses'))
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      {{session('sukses')}}
    </div>
    @endif
    <h4 class="text-center mt-4 mb-3" style="font-family:'Poppins', sans-serif;">Cari Kosmu</h4>
    <center>
      <form action="{{url('kos/cari')}}" method="get">
        <div class="input-group mb-3">
          <input type="text" name="cari" class="form-control form-sm" placeholder="Masukkan Alamat">
          <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit" id="search">Search</button>
          </div>
        </div>
      </form>
      <button style="font-family: 'Poppins', sans-serif;" class="btn btn-sm btn-center btn-outline-primary mt-2 mb-4" data-toggle="modal" data-target="#tipekos">Tipe Kos</button>
      <button style="font-family: 'Poppins', sans-serif;" class="btn btn-sm btn-center btn-outline-primary mt-2 mb-4" data-toggle="modal" data-target="#fasilitas">Fasilitas</button>
      <a href="" style="font-family: 'Poppins', sans-serif;" class="btn btn-sm btn-center btn-outline-primary mt-2 mb-4" data-toggle="modal" data-target="#harga">Harga Kos</a>
    </center>
  </div>
  <!---conten--->
  @if($show_all)
  <div class="container">
    <h5 class="text-left mb-3" style="font-family: 'Poppins', sans-serif;">Kost Terpopuler</h5>
  <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <div class="row">
      @forelse($show_all as $s)
      <div class="col-6 col-md-3 mb-3">
        <div style="width: 14,5rem;">
          <img src={{asset("img/".$s->foto)}} class="card-img-top img-fluid" style="width:250px; height:150px;" alt="...">  
          <a class="mt-2 mb-1 ml-2 mr-2" style="color: red;"><small> Sisa {{$s->jumlah_kamar}}</small></a>
          <a class="mt-2 mb-1"  style="color: blue;"><small>{{$s->tipe}}</small></a>
          <h6 class="head-capt ml-2" style="font-family: 'Lato', sans-serif;">{{$s->nama}}</h6>
          <div class=" hiden ml-2"  style="font-family: 'Lato', sans-serif;"><i class="fa fa-map ml-1 mr-1"></i><small>{{$s->aturan}}</small></div>
          <div class="hiden ml-2" style="font-family: 'Lato', sans-serif;"><small>{{$s->fasilitas}}</small></div>
          <a class="text-left price-capt ml-2 mb-3" style="font-family: 'Lato', sans-serif;">Rp. {{$s->harga}}/</a><a style="font-family: 'Lato', sans-serif;">Bulan</a><br>
          <a href={{url('kos/detail/'.$s->id)}} class=" text-center btn2 btn-block mb-1">Detail</a>
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
                <p>Kos belum ada</p>
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
  <div class="modal fade" id="tipekos" tabindex="-1" aria-labelledby="tipekos" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tipe Kost</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('kos/filter/tipe')}}" method="post">
        @csrf
          <div class="modal-body">
          <div class="checkbox"> <input type="checkbox" name="putra" value="Kos Putra" > Kos Putra </div>
          <div class="checkbox"> <input type="checkbox" name="putri" value="Kos Putri" > Kos Putri </div>
          <div class="checkbox"> <input type="checkbox" name="campur" value="Campur" > Campur </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Cari</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="fasilitas" tabindex="-1" aria-labelledby="fasilitas" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Fasilitas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('kos/filter/fasilitas')}}" method="post">
        @csrf
        <div class="modal-body">
          <div> <input type="checkbox" name="wifi" value="WiFi" > Wifi </div>
          <div> <input type="checkbox" name="listrik" value="Listrik" > Listrik </div>
          <div> <input type="checkbox" name="kmdalam" value="Kamar mandi dalam" > Kamar mandi dalam </div>
          <div> <input type="checkbox" name="kmluar" value="Kamar mandi luar" > Kamar mandi luar </div>
          <div> <input type="checkbox" name="dapur" value="Dapur" > Dapur </div>
          <div> <input type="checkbox" name="parkiran" value="Parkiran" > Parkiran </div>
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