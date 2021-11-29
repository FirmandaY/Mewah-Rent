@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Kategori Produk yang Ditawarkan</h2>
            </div>
            <div>
               <a class="btn btn-primary" href="{{ route('adminKategori.create') }}">  
                  <i class="fa fa-plus-square-o" style="font-size:12px"></i>
                  Tambah Kategori
               </a>
               <br><br>
            </div>
            
            <section>
               <div class="container">
                  <div class="row justify-content-center">
                     @foreach($data_kategori as $kategori)
                     <div class="col-md-4">
                           <div class="card" style="margin-bottom: 50px;">
                              <img src="{{ asset('thumb/'.$kategori->foto) }}" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h5 class="card-title">{{ $kategori->nama }}</h5>
                                 <strong class="item-count">{!! $kategori->keterangan !!}</strong>
                                 
                                 <form action="{{ route('adminKategori.destroy', $kategori->id) }}" method="post">
                                    @csrf
                                    <a class="btn-edit btn-primary" href="{{ route('adminKategori.edit', $kategori->id) }}"
                                       style="padding-right:8px; padding-left:8px;"
                                    > 
                                       Edit
                                       <i class="fa fa-pencil"></i>
                                    </a>
                                    <button class="btn-delete btn-danger" onClick="return confirm ('Yakin mau dihapus?')"
                                       style="padding-right:5px; padding-left:5px;"
                                    >
                                       <i class="fa fa-trash"></i>Hapus 
                                    </button>
                                 </form>
                              </div>
                           </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </section>
            
            
         </div>
      </div>
         
         
   </div>
   
@endsection
               

