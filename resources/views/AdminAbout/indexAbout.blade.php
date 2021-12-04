@extends('layouts.app')

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
               <div>
                  <a class="btn btn-primary" href="{{ route('adminAbout.create') }}">  
                     <i class="fa fa-plus-square-o" style="font-size:12px"></i>
                     Tambah About
                  </a>
                  
               </div>
               <br>
               @foreach($data_about as $about)
               <div class="row">
                  <div class="aboutimg1 col-md-6">
                        <a href="{{ asset('thumb/'.$about->foto) }}" data-lightbox="image-1">
                           <img class="img-about" src="{{ asset('thumb/'.$about->foto) }}">
                        </a>
                        
                        <br>
                  </div>
                  <div class="aboutcomment1 col-md-6">
                     <p>
                        {!! $about->tentangkami !!}
                     </p>
                     
                     <form action="{{ route('adminAbout.destroy', $about->id) }}" method="post">
                        @csrf
                        <a class="btn-edit btn-warning" href="{{ route('adminAbout.edit', $about->id) }}"> 
                           Edit About 
                           <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn-delete btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                           <i class="fa fa-trash"></i>Hapus 
                        </button>
                     </form>
                       
                  </div>
                  
               </div>
               <br>
               @endforeach
               
            </div>
         </div>
      </div>
   </div>
@endsection
               

