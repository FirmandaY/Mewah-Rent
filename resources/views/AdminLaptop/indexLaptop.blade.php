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
                    Daftar Laptop
                </div>
                
                <table class="table table-striped" border="2" align="center">
                    @foreach($data_laptop as $laptop)
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Gambar</th>
                            
                            <th colspan="7">Deskripsi</th>
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <td rowspan="3">{{ ++$no }}</td>
                                <td rowspan="3">{{ $laptop->id }}</td>
                                <td rowspan="3"><img src="{{ asset('thumb/'.$laptop->gambar) }}"></td>
                                <td colspan="7">{{ $laptop->deskripsi }}</td>
                                <td>
                                    <form action="{{ route('adminLaptop.destroy', $laptop->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                            <i class="fa fa-trash"></i>Hapus 
                                        </button>
                                    </form>
                                    <form action="{{ route('adminLaptop.edit', $laptop->id) }}" method="get">
                                        @csrf
                                        <button class="btn btn-info" onClick="return confirm ('Yakin mau diubah?')"> 
                                            <i class="fa fa-pencil"></i>Edit 
                                        </button>
                                    </form>
                                </td>

                            
                                
                                    <tr>
                                        <th>Merk</th>
                                        <th>Display</th>
                                        <th>Prosessor</th>
                                        <th>Kartu Grafis</th>
                                        <th>RAM</th>
                                        <th>Penyimpanan</th>
                                        <th>Sistem Operasi</th>
                                        <th>Harga Sewa</th>
                                        <th>Jumlah Unit</th>
                                    </tr>
                                
                                    <tr>
                                
                                        <td>{{ $laptop->merk }}</td>
                                        <td>{{ $laptop->display }}</td>
                                        <td>{{ $laptop->cpu }}</td>
                                        <td>{{ $laptop->gpu }}</td>
                                        <td>{{ $laptop->ram }}</td>
                                        <td>{{ $laptop->storage }}</td>
                                        <td>{{ $laptop->os }}</td>
                                    
                                        <td>{{ $laptop->harga }}</td>
                                        <td>{{ $laptop->jml_unit }}</td>
                                    </tr>
                                    <tr ><td colspan="12"></td></tr>
                            </tr>
                        
                    </tbody>
                    
                    
                    @endforeach

                    <tr>
                        <td colspan="13"><p align="center">
                            <a class="btn btn-primary" href="{{ route('adminLaptop.create') }}"> Tambah PC </a>
                        </p></td>
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="2">Keterangan</td>
                        <td colspan='11'> 
                            Jumlah Jenis PC = {{ $jenis_laptop }} Jenis <br>
                            Jumlah Total PC = {{ $jumlah_laptop }} Unit
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan='11'> Total Harga = {{ "Rp".number_format($jumlah_harga, 2, ',', '.') }} </td>
                    </tr>
                </table>
                
                <div>{{$data_laptop->links()}}</div>
                
                <br> <br>

            </div>
        </div>
        
    </body>
</html>

@endsection