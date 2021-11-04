@extends('layouts.app')

@section('content')
<html>
    <head>
       <title>Daftar PC</title>

    </head>
    <body>
        
        
            

            
        
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @endif

        <div class="flex-center position-ref">
            
            <div class="content">

                <div class="title m-b-md">
                    Daftar PC
                </div>
                
                <table class="table table-striped" border="2" align="center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Gambar</th>
                            <th>Merk</th>
                            <th>Prosessor</th>
                            <th>Kartu Grafis</th>
                            <th>RAM</th>
                            <th>Penyimpanan</th>
                            <th>Sistem Operasi</th>
                            <th>Deskripsi</th>
                            <th>Harga Sewa</th>
                            <th>Jumlah Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_pc as $pc)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $pc->id }}</td>
                                <td><img src="{{ url('/data_file/'.$pc->gambar) }}"></td>
                                <td>{{ $pc->merk }}</td>
                                <td>{{ $pc->cpu }}</td>
                                <td>{{ $pc->gpu }}</td>
                                <td>{{ $pc->ram }}</td>
                                <td>{{ $pc->storage }}</td>
                                <td>{{ $pc->os }}</td>
                                <td>{{ $pc->deskripsi }}</td>
                                <td>{{ $pc->harga }}</td>
                                <td>{{ $pc->jml_unit }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <td colspan="13"><p align="center">
                            <a href="{{ route('adminPC.create') }}"> Tambah PC </a>
                        </p></td>
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="2">Keterangan</td>
                        <td colspan='11'> Jumlah PC = {{ $jumlah_pc }} </td>
                    </tr>
                    <tr>
                        <td colspan='11'> Total Harga = {{ "Rp".number_format($jumlah_harga, 2, ',', '.') }} </td>
                    </tr>

                </table>
                
                <!--
                <div>{{$data_pc->links()}}</div>
                <div><strong>Jumlah Buku: {{ $jumlah_pc }}</strong></div>
                <br> <br>
                -->

            </div>
        </div>
        
    </body>
</html>

@endsection