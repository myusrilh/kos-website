@extends('layout.master')

@section('title','Detail')

@section('content')
@if($penginapan)
<div class="container">
    @if(!empty(Auth::user()))
        @if(Auth::user()->level == 'pemilik')
            <a href="{{url('pemilik/penginapan/'.Auth::user()->id)}}"><i style="font-size: 2.5rem" class="fa fa-arrow-left mt-5"></i></a>
        @else
            <a href="{{url('penginapan/show')}}"><i style="font-size: 2.5rem" class="fa fa-arrow-left mt-5"></i></a>
        @endif
    @else
        <a href="{{url('penginapan/show')}}"><i style="font-size: 2.5rem" class="fa fa-arrow-left mt-5"></i></a>
    @endif
    <div class="row mt-4 mb-4 ml-1 mr-2">
      <div class="col-md-6">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @for($i=0;$i<7;$i++)
                <div class="carousel-item {{$i === 0 ? "active":""}}"> <img class="d-block w-100" src={{asset("img/".$penginapan->foto)}} alt="slide {{$i}}"> </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <h4 class="text-left mt-3" style="font-family: 'Poppins', sans-serif;">{{$penginapan->nama}}</h4>
            </div>
    
            <div>
                <div class="price-capt mr-3 mt-2 mb-3" style="font-family: 'Lato', sans-serif;"><i class="fa fa-money-bill-wave ml-3 mr-3" style="color: green;"></i>Rp {{$penginapan->harga}}/</a><a style="font-family: 'Lato', sans-serif;">Bulan</div>
                <div class="text-capt-detail mr-3-3 mt-2 mb-3" style="font-family: 'Lato', sans-serif;" ><i class="fa fa-map ml-3 mr-3" style="color: green;"></i>{{$penginapan->lokasi}}</div>
            </div>
            <div class="rows">
                <h5 class="text-left mt-2 mt-4 mb-4" style="font-family: 'Poppins', sans-serif;">Fasilitas</h5>
                @php($fasilitas = explode("・",$penginapan->fasilitas))
                {{-- @php($icon = ["fa-wifi","fa-warehouse","fa-toilet","fa-plug"]) --}}
                @for($i=0;$i<count($fasilitas);$i++)
                    <div class="text-capt-detail mr-3 mt-4 mb-4" style="font-family: 'Lato', sans-serif;" ><i class="fa fa-arrow-right ml-3 mr-3"></i>{{$fasilitas[$i]}}</div>
                @endfor
            </div>
    
            <div class="rows">
                <h5 class="text-left mt-2 mt-4 mb-4" style="font-family: 'Poppins', sans-serif;">Luas Kamar</h5>
                <div class="text-capt-detail mr-3 mt-4 mb-4" style="font-family: 'Lato', sans-serif;" ><i class="fa fa-bed ml-3 mr-3"></i>3x3</div>
            </div>
    
    
        </div> 
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mt-3 mb-3"  style="font-family: 'Poppins', sans-serif;">
                        <h5 class="text-left" style="font-family: 'Poppins', sans-serif;">Aturan Kost</h5>
                        @php($aturan = explode(",",$penginapan->aturan))
                        <ul>
                            @for($i=0;$i<count($aturan);$i++)
                            <li>{{$aturan[$i]}}</li>
                            @endfor
                        </ul>
                    </div>
                        <div class="col-md-6 mt-3 mb-5" style="font-family: 'Poppins', sans-serif;">
                            @if(!empty(Auth::user()))
                                @if(Auth::user()->level == 'pemilik')
                                    <div>
                                        <a href="#" class="btn btn-block btn-sm btn-outline-success">Edit Data</a>
                                    </div>
                                @elseif(Auth::user()->level == 'pencari')
                                    <h5 style="font-family: 'Poppins', sans-serif;">Pesan Sekarang?</h5>
                                    <div>
                                        <a data-toggle="modal" data-target="#konfirmasi" class="btn btn-block btn-sm btn-outline-success">Pesan Penginapan</a>
                                    </div>
                                @endif
                            @else
                                <h5 style="font-family: 'Poppins', sans-serif;">Pesan Sekarang?</h5>
                                <div>
                                    @php(session(['failed' => 'Harap login terlebih dahulu']))
                                    <a href="{{url('auth/pencari/login')}}" class="btn btn-block btn-sm btn-outline-success">Pesan Penginapan</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>
</div>
@endif
<!-- Modal -->
<div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="konfirmasi" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('penginapan/pesan')}}" method="post">
            @csrf
            <div class="modal-body">
            <h5>Silahkan pilih tanggal</h5>
            @if(!empty(Auth::user()))
            <input type="number" name="id_pencari" class="form-control" value="{{Auth::user()->id}}" hidden>
            @endif
            <input type="number" name="id_penginapan" class="form-control" value="{{$penginapan->id}}" hidden>
            <input type="number" name="biaya_sewa" class="form-control" value="{{$penginapan->harga}}" hidden>
            <label for="mulai_sewa">Mulai Sewa</label>
            <input name="mulai_sewa" id="mulai_sewa" class="form-control" required type="date">
            <label for="akhir_sewa">Akhir Sewa</label>
            <input name="akhir_sewa" id="akhir_sewa" class="form-control" required type="date">
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a data-dismiss="modal" aria-label="Close" class="btn btn-outline-dark">Cancel</a>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection