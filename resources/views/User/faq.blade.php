@extends('masterBlog')

@section('banner')
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
            <div class="banner_main">
               <div class="container">
                  <div class="row">
                     <div class="titleMaster col-md-12 padding_right1">
                        <!--ini adalah wadah untuk bentuk banner utama-->
                        <h1 class="title-content">FAQ in Mewah</h1>
                        <!--<h1>Tempatnya Sewa</h1>-->
                     </div>
                  </div>
               </div>
            </div>
@endsection

@section('content')
      <!-- end banner -->
      <!-- faq -->
      <div id="FAQ" class="faq">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Pertanyaan yang sering diajukan.</h2>
                     <span>Cari tahu lebih banyak...</span>
                  </div>
                  @foreach($data_faq as $faq)
                  <section class="faq">
                     <div class="faq-left">
                        <!-- FAQ -->
				            <ul class="faq-container">
                           <li>
                              <label for="{{ $faq->id }}">Q: {{ $faq->pertanyaan }} </label> <input name="question" id="{{ $faq->id }}" type="checkbox" value="">
                              <div class="answer">
                                 <p>
                                    {!! $faq->jawaban !!}
                                 </p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </section>
                  @endforeach
                  
               </div>
            </div>
            
            
         </div>
      </div>
      <!-- end faq -->
      
@endsection

