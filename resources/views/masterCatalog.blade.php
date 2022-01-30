

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Mewah Rent | Produk </title>
      <link rel="shortcut icon" href="{{asset('images/logomewahicon.png')}}">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('css/styleMasterCat.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}"> 
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('images/logomewahfix.png')}}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div  class="head_top">
            <div class="header">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                    <a class="nav-link" href="/"> <b> Home </b> </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('aboutUser') }}"> <b> About Us </b></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="/"> <b> Product </b></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="/"> <b> Contact </b></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('faqUser') }}"> <b> FAQ </b></a>
                                 </li>
                              </ul>
                              <!--<div class="sign_btn"><a href="#contact">Contact Us</a></div>-->
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
            @yield('banner')
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner
            <div class="banner_main">
               <div class="container">
                  <div class="row">
                     <div class="col-md-9 padding_right1">
                        <!--ini adalah wadah untuk bentuk banner utama
                        <h1 class="titleAbout">About Us</h1>
                        <!--<h1>Tempatnya Sewa</h1>
                     </div>
                  </div>
               </div>
            </div>
            -->
         </div>
      </header>
      <!-- end banner -->
      <!-- konten -->
      <div id="about" class="about">
         <div class="container">
            <div class="row">
               @yield('content')
            </div>
         </div>
      </div>
      <!--WA Me
      <div class="wame-box">
         <a class="wame" href="https://wa.me/6289651881332">
            <img class="img-wame" src="{{ asset('images/WhatsApp-logo.png') }}" height="25" width="25">
            Contact Us On WhatsApp!
         </a>
      </div>
      <!--end WA Me-->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">

                  <div class="col-md-6">
                     @foreach($data_lokasi as $lokasi)
                     <div class="cont">
                        <iframe src="{{$lokasi->map}}" 
                        width="525" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                     </div>
                     @endforeach
                     
                  </div>

                  <div class="col-md-3">
                     <div class="cont_call">
                        <h3><strong class="multi">Alamat</strong></h3> <!--Data Alamat dari database-->
                        @foreach($data_lokasi as $lokasi)
                         <img src="{{ asset('images/pin.png') }}" height="30" width="30">
                         <h5><strong class="contact"> {{ $lokasi->alamat }} </strong></h5>
                        @endforeach

                        <h3><strong class="multi">Kontak</strong></h3> <!--Data Kontak dari database-->
                        @foreach($data_kontak as $kontak)
                        @if(!empty($kontak->no_telp))
                           <h5><strong class="contact"> <i class='fa fa-phone'></i>
                              {{ $kontak->no_telp }}
                              </strong>
                           </h5>
                           @if($kontak->tipe == 'ya')
                              <a class="btn-wa text-link" href="https://wa.me/{{ $kontak->no_telp }}">WhatssApp Now!</a> <br> <br>
                           @endif
                        @endif
                        @endforeach

                        @foreach($data_kontak as $kontak)
                        @if(!empty($kontak->email))
                           <h5><strong class="contact"> <i class='fa fa-envelope'></i>
                              {{ $kontak->email }}
                              </strong>
                           </h5>
                        @endif
                        @endforeach

                     </div>
                  </div>

                  <div class="col-md-3">
                     <h3><strong class="multi">Media Sosial</strong></h3> <!--Data Kontak dari database-->
                     @foreach($data_sosial as $sosial)
                        <h5><strong class="contact"> <i class='fa fa-thumb-tack'></i>
                           {{$sosial->media}} : <a class="link-social" href="{{$sosial->link}}"> {{ $sosial->username }} </a>
                           </strong>
                        </h5>
                     @endforeach
                  </div>
                  
               </div>
               <hr color="white">

               <div class="row">
                  <div class="col-md-1">
                     <h3><strong class="multi" align="center">Our Partners</strong></h3> <!--Data Kontak dari database-->
                  </div>

                  <div class="col-md-11">
                  @foreach($data_partner as $partner)
                  @if($partner->display == '1:1')
                     <a href="{{ $partner->link }}">
                        <img class="partner-pic" src="{{ asset('thumb/'.$partner->foto) }}" style="width: 30px; height: 30px"> <!--Data Kontak dari database-->
                     </a>
                  @else
                     <a href="{{ $partner->link }}">
                        <img class="partner-pic" src="{{ asset('thumb/'.$partner->foto) }}" style="width: 85px; height: 30px"> <!--Data Kontak dari database-->
                     </a>
                  @endif
                  @endforeach
                  </div>

               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>
                           © <script>document.write(new Date().getFullYear());</script> All Rights Reserved.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>

