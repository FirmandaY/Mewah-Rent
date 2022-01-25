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

        <div class="flex-center position-ref">
            
            <div class="content">

                <div class="title m-b-md">
                    Admin Footer Mewah Rent
                </div>

                <table class="table table-striped" border="2" align="center">
                    @foreach($data_lokasi as $lokasi)
                    <thead>
                        <tr>
                            <th>No</th>
                           
                            <th colspan="7">Map</th>
                            <th colspan="7">Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <td rowspan="3">{{ ++$no }}</td>
                                
                                <td colspan="7">{{ $lokasi->map }}</td>
                                <td colspan="7">{{ $lokasi->alamat }}</td>
                                <td>
                                    <form action="{{ route('adminLokasi.destroy', $lokasi->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                            <i class="fa fa-trash"></i>Hapus 
                                        </button>
                                    </form>
                                    <form action="{{ route('adminLokasi.edit', $lokasi->id) }}" method="get">
                                        @csrf
                                        <button class="btn btn-warning" onClick="return confirm ('Yakin mau diubah?')"
                                        style="padding-right:20px; padding-left:20px; margin-top:5px;"> 
                                            <i class="fa fa-pencil"></i>Edit 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                    
                    @endforeach

                    <tr>
                        <td colspan="13"><p align="center">
                            <a class="btn btn-primary" href="{{ route('adminLokasi.create') }}"> Tambah Lokasi </a>
                        </p></td>
                    </tr>
                </table>
                
                <div>{{$data_lokasi->links()}}</div>
                
                <br> <br>

            </div>
        </div>
        
    </body>
</html>

@endsection