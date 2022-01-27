@extends('layouts.app')

@section('content')
<html>
    <head>
       
    </head>
    <body>
         
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @elseif(Session::has('pesanHapus'))
            <div class="alert alert-danger">{{ Session::get('pesanHapus') }}</div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                    <h2>Kategori Produk yang Ditawarkan</h2>
                    </div>
                    <div>
                    <a class="btn btn-primary" href="{{ route('adminLokasi.create') }}">  
                        <i class="fa fa-plus-square-o" style="font-size:12px"></i>
                        Tambah Kategori
                    </a>
                    <br><br>
                    </div>
                    
                    <section>
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach($data_lokasi as $lokasi)
                            <div class="col-md-6">
                                <div class="card" style="margin-bottom: 50px;">
                                <iframe src="{{$lokasi->map}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    <div class="card-body">
                                        <h5 class="card-title">Alamat</h5>
                                        <strong class="item-count">{{ $lokasi->alamat }}</strong>
                                        
                                        <form action="{{ route('adminLokasi.destroy', $lokasi->id) }}" method="post">
                                            @csrf
                                            <a class="btn-edit btn-warning" href="{{ route('adminLokasi.edit', $lokasi->id) }}"
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
        
    </body>
</html>

@endsection