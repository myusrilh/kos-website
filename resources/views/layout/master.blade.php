<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" sizes="76x76" href="admin/assets/img/apple-icon.png">
{{-- Icon website --}}
<link rel="icon" type="image/png" href="https://turreta.com/wp-content/uploads/2018/10/laravel-logo.png">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href={{asset("css/pemilik.css")}}>
<link rel="stylesheet" href={{asset("css/pencari.css")}}>
{{-- Material Icon --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
{{-- <link href="{{ asset('css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" /> --}}
<script src="https://kit.fontawesome.com/1e7e89b227.js" crossorigin="anonymous"></script>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    nav-body {
    background: #FFFFFF;
    background: linear-gradient(rgba(91, 203, 173, 1), rgba(39, 194, 153, 1));
    }
    a{
    font-family: 'Poppins', sans-serif;
    font-size: 0.82rem;
    line-height: 1.6rem;    
    }
    div.hiden {
        white-space: nowrap; 
        width: 140px; 
        overflow: hidden;
        text-overflow: ellipsis; 
    }
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;1,100&display=swap');
	.btn0{
    color: #FF0000;
		border-radius: 10px;
		outline: none !important;
		border: none !important; 
	}
	.btn1{
        color:  #000000;
		border-radius: 10px;
		outline: none !important;
		border: none !important;
	}
	.btn2{
        background-color:rgb(27,170,86);
        color : #FFFFFF;
        border-radius: 10px;
        outline: none !important;
        border: none !important;
	}
    .text-content{
        font-size: 0.875rem;
        line-height: 1.75rem;
        color: #A8ADB7;
    }
    .text-capt{
    font-size: 11px;
    line-height: 14px;
    color: #000000;
    }
    .head-capt{
        font-size: 16px;
        line-height: 24px;
        font-weight: bolder;
        color: #303030;
    }
    .price-capt{
        font-size: 16px;
        line-height: 24px;
        font-weight: bolder;
        color: #303030;
    }
    .text-capt-detail{
    font-size: 15px;
    line-height: 14px;
    color: #000000;
  }
  .card-icon{
    border-radius: 3px;
    background-color: #999999;
    padding: 15px;
    margin-top: -20px;
    margin-right: 15px;
    float: left;
  }
  .card-icon-small{
    border-radius: 3px;
    background-color: #999999;
    padding: 5px;
  }
</style>
<title>@yield('title')</title>
</head>
<body>

    <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark bg-primary nav-body">
      @if(!empty(Auth::user()->id))
        @if(Auth::user()->level == 'pencari')  
          <a class="navbar-brand ml-4" href="{{url('/')}}">SaCari</a>
        @endif
        @if(Auth::user()->level == 'pemilik')  
          <a class="navbar-brand ml-4" href="{{url('pemilik/home')}}">SaCari</a>
        @endif
        @if(Auth::user()->level == 'admin')  
          <a class="navbar-brand ml-4" href="{{url('admin/home')}}">SaCari</a>
        @endif
      @else
        <a class="navbar-brand ml-4" href="{{url('/')}}">SaCari</a>
      @endif
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> 
      </button>
      <div class="collapse navbar-collapse mr-3" id="navbarContent">
        <ul class="navbar-nav ml-auto mr-3">
          @if(!empty(Auth::user()))
            @if(Auth::user()->level == 'pencari')
              <li class="nav-item active mr-3">
                <a class="nav-link" href={{url('kos/show')}}>Cari Kosan</a>
              </li>
              <li class="nav-item active mr-3">
                <a class="nav-link" href={{url('penginapan/show')}}>Cari Penginapan</a>
              </li>
              <li class="nav-item active mr-3">
                <a class="nav-link" href={{url('kontrakan/show')}}>Cari Kontrakan</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user"></i> {{strtok(Auth::user()->nama,' ')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('pencari/profile')}}">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('pencari/list/transaksi')}}">Riwayat Transaksi</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('auth/pencari/logout')}}">Logout</a>
                </div>
              </li>
            @elseif(Auth::user()->level == 'pemilik')
              <li class="nav-item active mr-3">
                <a class="nav-link" href={{url('pemilik/kos/'.Auth::user()->id)}}>Kosan</a>
              </li>
              <li class="nav-item active mr-3">
                <a class="nav-link" href={{url('pemilik/penginapan/'.Auth::user()->id)}}>Penginapan</a>
              </li>
              <li class="nav-item active mr-3">
                <a class="nav-link" href={{url('pemilik/kontrakan/'.Auth::user()->id)}}>Kontrakan</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user"></i> {{strtok(Auth::user()->nama,' ')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('pemilik/profile')}}">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('auth/pemilik/logout')}}">Logout</a>
                </div>
              </li>
            @elseif(Auth::user()->level == 'admin')
              <li class="nav-item active mr-3">
                <a class="nav-link" href='{{url('admin/user')}}'>List User</a>
              </li>
              <li class="nav-item active mr-3">
                <a class="nav-link" href='{{url('admin/pesanan')}}'>List Pesanan</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user"></i> {{strtok(Auth::user()->nama,' ')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('admin/profile')}}">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('auth/admin/logout')}}">Logout</a>
                </div>
              </li>
            @endif
          @else
          <li class="nav-item active mr-3">
            <a class="nav-link" href={{url('kos/show')}}>Cari Kosan</a>
          </li>
          <li class="nav-item active mr-3">
            <a class="nav-link" href={{url('penginapan/show')}}>Cari Penginapan</a>
          </li>
          <li class="nav-item active mr-3">
            <a class="nav-link" href={{url('kontrakan/show')}}>Cari Kontrakan</a>
          </li>
          <li class="nav-item active mr-3">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Masuk</a>
          </li>
          @endif
        </ul>
      </div>
      <!---modal Start--->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">Masuk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <a href={{url('auth/pemilik/login')}} class="btn btn-block btn-md btn-outline-danger">Pemilik</a>
              <a href={{url('auth/pencari/login')}} class="btn btn-block btn-md btn-outline-primary">Pencari</a>
            </div>
          </div>
        </div>
      </div>
      
      
      </nav>
    
    @yield('content')
    
    <footer class="bg-primary text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <h5 class="text-cetnter mt-2 mb-2" style="font-family: 'Poppins', sans-serif;">Tentang SaCari</h5>
          <div class="row">
            <div class="mb-2 text-capt"  style="font-family: 'Poppins', sans-serif; color: white;">
             SaCari merupakan website pencarian kost, kontrakan hingga hotel yang dapat memudahkanmu mencari kost hingga penginapan yang kamu inginkan.
             Informasi ketersediaan kamar dan harga kost hingga hotel kami upayakan selalu update untuk memastikan info kost, kontrakan hingga penginpan kami akurat dan bermanfaat untuk kamu.
             SaCari menyediakan fitur pencarian yang memudahkanmu dalam mencari kost hingga penginapan
            berupa foto, harga, fasilitas hingga ketersediaan.
            </div>
          </div>
      
      
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-primary btn-sm btn-floating m-1" style="background-color: white;" href="#!" role="button"><i class="fab fa-facebook-f" style="color: black;"></i></a>
      
            <!-- Twitter -->
            <a class="btn btn-primary btn-sm btn-floating m-1" style="background-color: white;" href="#!" role="button"><i class="fab fa-twitter"style="color: black;"></i></a>
      
            <!-- Google -->
            <a class="btn btn-primary btn-sm btn-floating m-1" style="background-color: white;" href="#!" role="button"><i class="fab fa-google"style="color: black;"></i></a>
      
            <!-- Instagram -->
            <a class="btn btn-primary btn-sm btn-floating m-1" style="background-color: white;" href="#!" role="button"><i class="fab fa-instagram"style="color: black;"></i></a>
      
          </section>
          <!-- Section: Social media -->
          <!-- Section: Text -->
      
      
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2021 Copyright:
          <a class="text-white" href="Sacari.com">SaCari</a>
        </div>
        <!-- Copyright -->
      
    </footer>
    <!-- Footer -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>