@extends('layouts.app')

@section('content')

@if(count($data_produk))
    <div class="alert alert-success"> 
        Ditemukan <strong>{{count($data_produk)}}</strong>
        Data dengan kata: <strong>{{ $cari }}</strong>
    </div>


@if(Session::has('pesan'))
    <div class="alert alert-success">{{ Session::get('pesan') }}</div>
@endif
    <div class="flex-center position-ref">
        <div class="content">
            <div class="title m-b-md">
                Daftar Pencarian Produk
            </div>
            <table class="table table-striped" border="2" align="center">
            @foreach($data_produk as $data)
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
                                <td rowspan="3">{{ $data->id }}</td>
                                <td rowspan="3"><img src="{{ asset('thumb/'.$data->gambar) }}" style="width: 150px; height: 100px"></td>
                                <td colspan="7">{!! $data->deskripsi !!}</td>
                                <td>
                                    <form action="{{ route('adminProdukLain.destroy', $data->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                            <i class="fa fa-trash"></i>Hapus 
                                        </button>
                                    </form>
                                    <form action="{{ route('adminProdukLain.edit', $data->id) }}" method="get">
                                        @csrf
                                        <button class="btn btn-warning" onClick="return confirm ('Yakin mau diubah?')"
                                        style="padding-right: 20px; padding-left: 20px; margin-top:5px;"> 
                                            <i class="fa fa-pencil"></i>Edit 
                                        </button>
                                    </form>
                                </td>

                            
                                
                                    <tr>
                                        <th>Merk</th>
                                        <th>Display</th>
                                        <th>Sistem Operasi</th>
                                        <th>Harga Sewa</th>
                                        <th>Jumlah Unit</th>
                                    </tr>
                                
                                    <tr>
                                
                                        <td>{{ $data->merk }}</td>
                                        <td>{{ $data->display }}</td>
                                        <td>{{ $data->os }}</td>
                                    
                                        <td>{{ $data->harga }}</td>
                                        <td>{{ $data->jml_unit }}</td>
                                    </tr>
                                    <tr ><td colspan="11"></td></tr>
                            </tr>
                        
                    </tbody>
                    
                    
                    @endforeach
                    <tr>
                        <td rowspan="2" colspan="2">Keterangan</td>
                        <td colspan='11'> 
                            Ditemukan <strong>{{count($data_produk)}}</strong> dari {{ $jenis_produk }} Jenis Produk <br>
                        </td>
                        
                    </tr>
            </table> 
            <div>{{$data_produk->links()}}</div>
            <br> <br>

            @else
                <div class="alert alert-warning"><h4> Data {{ $cari }} tidak ditemukan </h4>
                <a href="/adminProdukLain" class="btn btn-warning">Kembali</a></div>
            @endif
        </div>
    </div>

@endsection
