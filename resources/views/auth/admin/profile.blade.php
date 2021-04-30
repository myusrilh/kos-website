@extends('layout.master')

@section('title','Profile Admin')

@section('content')
<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1 class="head1">Profile</h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        {{-- <h5 class="head2">Upload foto terbaru</h5>
        <input type="file" class="text-center center-block file-upload"> --}}
      </div></hr><br> 

          
        </div><!--/col-3-->
    	<div class="col-sm-9">  
          <div class="#">
            <div class="#" id="profile">
                <hr>
                  <form class="form" action="{{url('admin/edit/profile')}}" method="post" id="registrationForm">
                    @csrf  
                    <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h5 class="head2">Nama Depan</h5></label>
                              <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan" title="masukkan nama depan Anda jika ada." value="{{substr($user->nama,0,strpos($user->nama,' '))}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h5 class="head2">Nama Belakang</h5></label>
                              <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" title="masukkan nama belakang Anda jika ada." value="{{$user->nama != null ? substr($user->nama,strpos($user->nama,' '),strlen($user->nama)) : ' '}}">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="nomor"><h5 class="head2">No Hp</h5></label>
                              <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Masukkan nomor hp" title="masukkan nomor HP Anda." value="{{$user->nomor}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h5 class="head2">Email</h5></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@domain.com" title="masukkan email Anda." value="{{$user->email}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h5 class="head2">Alamat</h5></label>
                              <input type="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat" title="masukkan alamat" value="{{$user->alamat}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h5 class="head2">Password</h5></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="masukkan password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h5 class="head2">Verifikasi</h5></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password" title="masukkan password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-sm btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Simpan</button>
                               	<a class="btn btn-sm" href="{{url('admin/home')}}"><i class="glyphicon glyphicon-repeat"></i> Cancel</a>
                            </div>
                      </div>
              	</form>
              
              <hr>
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
  </div>
@endsection