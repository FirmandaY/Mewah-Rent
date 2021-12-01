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
                    Galeri {{ $produk->merk }}
                </div>

                <form action="{{ route('adminProdukLain.search') }}" method="get">
                    @csrf
                    <button class="btn-search btn-outline-dark">
                        <i class="fa fa-search"></i>
                    </button>
                    <input type="text" name="kata" class="form-searchbox" placeholder="Cari {{ $produk->merk }}" >
                </form>

                <table class="table table-striped" border="2" align="center">
                    @foreach($galeris as $data)
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Gambar</th>
                            
                            <th colspan="7">Judul Gambar</th>
                            <th colspan="7">Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <td rowspan="3">{{ ++$no }}</td>
                                <td rowspan="3">{{ $data->id }}</td>
                                <td rowspan="3">
                                    <img src="{{ asset('thumb/'.$data->foto) }}" style="width: 150px; height: 100px" > <br>
                                    <a class="btn-lihat btn-success" href="{{ asset('thumb/'.$data->foto) }}" data-lightbox="image-1" data-title="{{ $data->merk }}">
                                        Lihat
                                    </a>
                                </td>
                                <td colspan="7">{{ $data->nama_galeri }}</td>
                                <td colspan="7">{!! $data->keterangan !!}</td>
                                <td>
                                    <form action="{{ route('adminGaleriPL.destroy', $data->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                            <i class="fa fa-trash"></i>Hapus 
                                        </button>
                                    </form>
                                    <form action="{{ route('adminGaleriPL.edit', $data->id) }}" method="get">
                                        @csrf
                                        <button class="btn btn-info" onClick="return confirm ('Yakin mau diubah?')"> 
                                            <i class="fa fa-pencil"></i>Edit 
                                        </button>
                                    </form>
                                </td>

                                    <tr ><td colspan="11"></td></tr>
                            </tr>
                        
                    </tbody>
                    
                    
                    @endforeach

                    <tr>
                        <td colspan="13"><p align="center">
                            <a class="btn btn-primary" href="{{ route('adminGaleriPL.create') }}"> Tambah Produk </a>
                        </p></td>
                    </tr>
                    
                </table>
                
                <div>{{$galeris->links()}}</div>
                
                <br> <br>

            </div>
        </div>
        
    </body>
</html>

@endsection