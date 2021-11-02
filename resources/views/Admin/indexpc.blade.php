@extends('layouts.app')

@section('content')
<html>
    <head>
       <title>Daftar PC</title>

    </head>
    <body>
        
        
            

            <style>
                html, body {
                
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                background-image: url("images/backgroundIndex3.jpg");
                background-attachment: fixed;
                background-size: cover;
                background-repeat: no-repeat;
                        
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #fff;
                
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .home:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }
            .news:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }
            .about:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }
            .product:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }
            .github:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .alert{
                text-align: center;
            }
            .del{
                background-color: rgb(255, 55, 82);
            }
            .updat{
                background-color: #FDC800;
                padding: 0px 15px 0px 15px;
            }
            .table{
                background-color:rgba(255, 255, 255, 0.807);
            }
        </style>
        
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
                                <td>{{ $pc->gambar }}</td>
                                <td>{{ $pc->merk }}</td>
                                <td>{{ $pc->cpu }}</td>
                                <td>{{ $pc->gpu }}</td>
                                <td>{{ $pc->ram }}</td>
                                <td>{{ $pc->storage }}</td>
                                <td>{{ $pc->os }}</td>
                                <td>{{ $pc->deskripsi }}</td>
                                <td>{{ $pc->harga }}</td>
                                <td>{{ $pc->jml_unit }}</td>
                                <!--
                                <td>
                                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                                        @csrf
                                        <button class="del" onClick="return confirm ('Yakin mau dihapus?')"> Hapus </button>
                                    </form>
                                    <form action="{{ route('buku.edit', $buku->id) }}" method="get">
                                        @csrf
                                        <button class="updat" onClick="return confirm ('Yakin mau diubah?')"> Edit </button>
                                    </form>
                                </td>
                                -->
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