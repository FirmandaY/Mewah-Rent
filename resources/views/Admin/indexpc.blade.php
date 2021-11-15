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
                    Daftar Komputer (PC)
                </div>
                
                <table class="table table-striped" border="2" align="center">
                    @foreach($data_pc as $pc)
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
                                <td rowspan="3">{{ $pc->id }}</td>
                                <td rowspan="3"><img src="{{ asset('thumb/'.$pc->gambar) }}"></td>
                                <td colspan="7">{{ $pc->deskripsi }}</td>
                                <td>
                                    <form action="{{ route('adminPC.destroy', $pc->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                            <i class="fa fa-trash"></i>Hapus 
                                        </button>
                                    </form>
                                    <form action="{{ route('adminPC.edit', $pc->id) }}" method="get">
                                        @csrf
                                        <button class="btn btn-info" onClick="return confirm ('Yakin mau diubah?')"> 
                                            <i class="fa fa-pencil"></i>Edit 
                                        </button>
                                    </form>
                                </td>

                            
                                
                                    <tr>
                                        <th>Merk</th>
                                        <th>Prosessor</th>
                                        <th>Kartu Grafis</th>
                                        <th>RAM</th>
                                        <th>Penyimpanan</th>
                                        <th>Sistem Operasi</th>
                                        <th>Harga Sewa</th>
                                        <th>Jumlah Unit</th>
                                    </tr>
                                
                                    <tr>
                                
                                        <td>{{ $pc->merk }}</td>
                                        <td>{{ $pc->cpu }}</td>
                                        <td>{{ $pc->gpu }}</td>
                                        <td>{{ $pc->ram }}</td>
                                        <td>{{ $pc->storage }}</td>
                                        <td>{{ $pc->os }}</td>
                                    
                                        <td>{{ $pc->harga }}</td>
                                        <td>{{ $pc->jml_unit }}</td>
                                    </tr>
                                    <tr ><td colspan="11"></td></tr>
                            </tr>
                        
                    </tbody>
                    
                    
                    @endforeach

                    <tr>
                        <td colspan="13"><p align="center">
                            <a class="btn btn-primary" href="{{ route('adminPC.create') }}"> Tambah PC </a>
                        </p></td>
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="2">Keterangan</td>
                        <td colspan='11'> 
                            Jumlah Jenis PC = {{ $jenis_pc }} Jenis <br>
                            Jumlah Total PC = {{ $jumlah_pc }} Unit
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan='11'> Total Harga = {{ "Rp".number_format($jumlah_harga, 2, ',', '.') }} </td>
                    </tr>
                </table>
                
                <div>{{$data_pc->links()}}</div>
                
                <br> <br>

            </div>
        </div>
        
    </body>
</html>

@endsection