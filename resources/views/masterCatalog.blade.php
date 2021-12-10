

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
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
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
      <!--WA Me-->
      <div class="wame-box">
         <a class="wame" href="https://wa.me/6282322881233">
            <img class="img-wame" src="{{ asset('images/WhatsApp-logo.png') }}" height="25" width="25">
            Contact Us On WhatsApp!
         </a>
      </div>
      <!--end WA Me-->
      <!--  footer -->
      <footer>
         <div id="contact" class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="cont">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2721.0456666951964!2d109.0605317902281!3d-6.90269982515536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0!2zNsKwNTQnMTIuMCJTIDEwOcKwMDMnMzkuOCJF!5e0!3m2!1sen!2sid!4v1633410512215!5m2!1sen!2sid" 
                        width="525" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="cont_call">
                        <h3><strong class="multi">Contact Us On</strong></h3><br>
                        <h5><strong class="contact"><img src="{{ asset('images/pin.png') }}" height="30" width="30">
                           Jl. Lembarawa, Sawah, Krasak, Kec. Brebes, Kabupaten Brebes, Jawa Tengah 52219
                        </h5>
                        <h5><strong class="contact"><img src="{{ asset('images/telephone.png') }}" height="30" width="30">
                           0823-2288-1233
                           </strong>
                        </h5>
                        <h5><strong class="contact"><img src="{{ asset('images/email.png') }}" height="30" width="30">
                           mewahrent@gmail.com
                           </strong>
                        </h5>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2019 All Rights Reserved.</p>
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

