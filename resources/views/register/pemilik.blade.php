@extends('layout.master')

@section('title','Daftar')
@section('content')
<div>
  @if ($errors->any())
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
      <ul>
        @foreach($errors->all() as $error)
        <li>
          {{ $error }} <br>
        </li>
        @endforeach
      </ul>
  </div>
  @endif 
  @if (session('failed'))
    <div class="alert alert-danger" role="alert">
        {{session('failed')}}
    </div>
  @endif
</div>
<section> 
<div class="d-flex flex-column align-items-center h-100 flex-lg-row" style="font-family: 'Poppins', sans-serif;">
  <div class="position-relative d-none d-lg-block h-100 width-left-content-3-5">
      <img class="img-fluid" src={{asset("img/login.jpg")}} alt="">                      
    </div>
    <div class="d-flex mx-auto align-items-left justify-content-left width-right-content-3-5">
      <div class="right-content-3-5">
        <div class="align-items-center justify-content-center d-lg-none d-flex">
          <img class="img-fluid" src={{asset("img/login.jpg")}} alt="">  
        </div>
        <h3 class="title-text-content-3-5">Daftar untuk membuat akun</h3>
        <p class="caption-text-content-3-5">Silahkan memasukkan<br>
          data diri anda</p>

        <form style="margin-top: 1.5rem;" action="{{url('/pemilik/insert')}}" method="post">
          @csrf
          <div style="margin-bottom: 1.75rem;">
            <label for="" class="d-block input-label-content-3-5">Nama</label>
            <div class="d-flex w-100 div-input-content-3-5">
              <input class="input-field-content-3-5" type="text" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="on" value="{{old('nama')}}">
            </div>
          </div>
          <div style="margin-top: 1rem;">
            <label for="" class="d-block input-label-content-3-5">Alamat Email</label>
            <div class="d-flex w-100 div-input-content-3-5">
              <input class="input-field-content-3-5" type="email" name="email" id="email" placeholder="Alamat Email" autocomplete="on" value="{{old('email')}}">
            </div>
          </div>
          <div style="margin-top: 1rem;">
            <label for="" class="d-block input-label-content-3-5">No Telepon</label>
            <div class="d-flex w-100 div-input-content-3-5">
              <input class="input-field-content-3-5" type="number" name="nomor" id="nomor" placeholder="Nomor Telfon" autocomplete="on" value="{{old('nomor')}}">
            </div>
          </div>
          <div style="margin-bottom: 1rem;">
            <label for="" class="d-block input-label-content-3-5">Alamat</label>
            <div class="d-flex w-100 div-input-content-3-5">
              <input class="input-field-content-3-5" type="text" name="alamat" id="alamat" placeholder="Alamat Rumah" autocomplete="on" value="{{old('alamat')}}">
            </div>
          </div>
          <div style="margin-top: 1rem;">
            <label for="" class="d-block input-label-content-3-5">Password</label>
            <div class="d-flex w-100 div-input-content-3-5">
              <input class="input-field-content-3-5" type="password" name="password" id="password" placeholder="Password" value="{{old('password')}}">
            </div>
          </div>
          <button class="btn btn-fill-content-3-5 d-block w-100" type="submit">Daftar</button>
        </form>
        <p class="text-center bottom-caption-content-3-5">Sudah memiliki akun?
          <a class="green-bottom-caption-content-3-5" href={{url('auth/login')}}>Masuk</a>
        </p>
      </div>
    </div>


  </div>
  
</section> 
@endsection
