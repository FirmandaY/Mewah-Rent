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
               <h1 class="titleMaster">About Us</h1>
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
                  @foreach($data_about as $about)
                     <div class="row">
                        
                           <div class="aboutimg1 col-md-6">
                              <img src="{{ asset('thumb/'.$about->foto) }}" width="600px" height="700px">
                           </div>
                           <div class="aboutcomment1 col-md-6">
                              
                              <p>
                                 {!! $about->tentangkami !!}
                              </p>
                           </div>
                     </div>
                     <br><br>
                  @endforeach
               </div>
               <br>
               
               <br>
               <!-- <div class="col-md-12">
                    <div class="row">
                        <div class="aboutcomment2 col-md-6">
                            <h3 class="aboutcomment2">Who are we?</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod t dolor in 
                                reprehenderit in voluptate velit. guadaluppi... benzo? guada, guada luppi? buenzo!
                            </p>
                        </div>
                        <div class="aboutimg2 col-md-6">
                            <img src="images/imacblue.png">
                        </div>
                    </div>
                </div> -->
            </div>
            
            
         </div>
      </div>
      <!-- about -->
      
      <!-- testimonial -->
      <!-- <br>
      <br>
      <br>
      <br>
      <div class="testimonial">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Testimonial</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide testimonial_Carousel " data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption ">
                                 <div class="row">
                                    <div  class="col-md-12">
                                       <div class="test_box">
                                          <h3>Michl ro</h3>
                                          <p><i class="padd_rightt0"><img src="images/te1.png" alt="#"/></i>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some <i class="padd_leftt0"><img src="images/te2.png" alt="#"/></i> <br>form, by injected humour, or randomised words which don't look even slightly believable</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div  class="col-md-12">
                                       <div class="test_box">
                                          <h3>Michl ro</h3>
                                          <p><i class="padd_rightt0"><img src="images/te1.png" alt="#"/></i>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some <i class="padd_leftt0"><img src="images/te2.png" alt="#"/></i> <br>form, by injected humour, or randomised words which don't look even slightly believable</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div  class="col-md-12">
                                       <div class="test_box">
                                          <h3>Michl ro</h3>
                                          <p><i class="padd_rightt0"><img src="images/te1.png" alt="#"/></i>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some <i class="padd_leftt0"><img src="images/te2.png" alt="#"/></i> <br>form, by injected humour, or randomised words which don't look even slightly believable</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <!-- end testimonial -->
      
@endsection
