@extends('layouts.app')

@section('content')

   @if(Session::has('pesan'))
      <div class="alert alert-success">{{ Session::get('pesan') }}</div>
   @elseif(Session::has('pesanHapus'))
      <div class="alert alert-danger">{{ Session::get('pesanHapus') }}</div>
   @endif
   <!-- faq -->
   <div id="FAQ" class="faq">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Pertanyaan yang sering diajukan.</h2>
                  <span>Cari tahu lebih banyak...</span>
               </div>
               <div>
                  <a class="btn btn-primary" href="{{ route('adminFAQ.create') }}">  
                     <i class="fa fa-plus-square-o" style="font-size:12px"></i>
                     Tambah FAQ
                  </a>
                  
               </div>
              
               <section>
                  <div class="faq-left">
                     <!-- FAQ -->
                     <ul class="faq-container">
                        @foreach($data_faq as $faq)
                        <li>
                           <label for="{{ $faq->id }}">Q: {{ $faq->pertanyaan }} </label> <input name="question" id="{{ $faq->id }}" type="checkbox" value="">
                           <div class="answer">
                              <p>
                                 {!! $faq->jawaban !!}
                              </p>
                           </div>
                           
                           <form action="{{ route('adminFAQ.destroy', $faq->id) }}" method="post">
                              @csrf
                              <a class="btn-edit btn-warning" href="{{ route('adminFAQ.edit', $faq->id) }}"> 
                                 Edit FAQ 
                                 <i class="fa fa-pencil"></i>
                              </a>
                              <button class="btn-delete btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                 <i class="fa fa-trash"></i>Hapus 
                              </button>
                           </form>

                        </li>
                        @endforeach
                     </ul>
                  </div>
               </section>
              
               
            </div>
         </div>
         
         
      </div>
   </div>
      <!-- end faq -->
@endsection
               

