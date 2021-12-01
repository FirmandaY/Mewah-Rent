@extends('masterBlog')

@section('banner')

   <!-- end header inner -->
   <!-- end header -->
   <!-- banner -->
   <div class="banner_main">
      <div class="container">
         <div class="row">
            <div class="col-md-9 padding_right1">
               <!--ini adalah wadah untuk bentuk banner utama-->
               <h1 class="titleMaster">{{ $produk->merk }}</h1>
               <!--<h1>Tempatnya Sewa</h1>-->
            </div>
         </div>
      </div>
   </div>
      <!-- end banner -->
@endsection

@section('content')
   <!-- about -->
   <div id="about" class="about">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <!-- <div class="titlepage">
                  <h2>About Mewah Rent</h2>
                  <span></span>
               </div> -->
               
                  <div class="row">
                       
                     <div class="aboutimg1 col-md-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                           <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

                              @foreach($galeris as $data)
                              <li data-target="#carouselExampleIndicators" data-slide-to="{{ $data->id }}"></li>
                              @endforeach
                           </ol>
                           <div class="carousel-inner">
                              
                              <div class="carousel-item active">
                                 <img class="d-block w-100" src="{{  asset('images/logomewah.png') }}" alt="First slide">
                              </div>
                              @foreach($galeris as $data)
                              <div class="carousel-item">
                                 <img class="d-block w-100" src="{{ asset('thumb/'.$data->foto) }}" alt="Second slide">
                              </div>
                              @endforeach
                           </div>
                           <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                           </a>
                           <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                           </a>
                           
                        </div>
                     </div>

                     <div class="aboutcomment1 col-md-6">
                        <p align="left">
                           Merk Produk: {{ $produk->merk }}
                        </p>
                        <p>
                           Display: {{ $produk->display }}
                        </p>
                        <p>
                           Sistem Operasi: {{ $produk->os }}
                        </p>
                        <p>
                           Harga Sewa: {{ $produk->harga }}
                        </p>
                        <p>
                           Jumlah Unit: {{ $produk->jml_unit }}
                        </p>
                        <p>
                           {!! $produk->deskripsi !!}
                        </p>
                     </div>
                  </div>
                  <br><br>
               
            </div>
            <br>
         </div>
         
         
      </div>
   </div>


      
@endsection
