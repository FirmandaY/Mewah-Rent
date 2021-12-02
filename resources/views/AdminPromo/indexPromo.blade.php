@extends('layouts.app')

@section('content')
<html>
    <head>
       
    </head>
    <body>
         
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @endif

        <div class="flex-center position-ref">
            
            <div class="content">

                <div class="title m-b-md">
                    Promo Mewah Rent
                </div>

                <table class="table table-striped" border="2" align="center">
                    @foreach($data_promo as $promo)
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            
                            <th colspan="7">Judul Promo</th>
                            <th colspan="7">Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <td rowspan="3">{{ ++$no }}</td>
                                <td rowspan="3">
                                    <a href="{{ asset('thumb/'.$promo->gambar_promo) }}" data-lightbox="image-1" data-title="{{ $promo->nama_galeri }}">
                                        <img src="{{ asset('thumb/'.$promo->gambar_promo) }}" style="width: 250px; height: 150px" >
                                    </a>
                                </td>
                                <td colspan="7">{{ $promo->judul_promo }}</td>
                                <td colspan="7">{!! $promo->deskripsi_promo !!}</td>
                                <td>
                                    <form action="{{ route('adminPromo.destroy', $promo->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                            <i class="fa fa-trash"></i>Hapus 
                                        </button>
                                    </form>
                                    <form action="{{ route('adminPromo.edit', $promo->id) }}" method="get">
                                        @csrf
                                        <button class="btn btn-info" onClick="return confirm ('Yakin mau diubah?')"> 
                                            <i class="fa fa-pencil"></i>Edit 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                    
                    @endforeach

                    <tr>
                        <td colspan="13"><p align="center">
                            <a class="btn btn-primary" href="{{ route('adminPromo.create') }}"> Tambah Promo </a>
                        </p></td>
                    </tr>
                </table>
                
                <div>{{$data_promo->links()}}</div>
                
                <br> <br>

            </div>
        </div>
        
    </body>
</html>

@endsection