@extends('layouts.app')

@section('content')
<html>
    <head>
     
    </head>
    <body>
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @endif
        <div class="container">
            <h4>Edit Informasi Produk</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data Produk Berikut :</legend>
                    <form method="post" action="{{route('adminProdukLain.update',$produk->id)}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Gambar</label> <br>
                            <input class="boxisi" type="file" name="gambar" value="{{ url('/data_file/'.$produk->gambar) }}">
                        </p>
                        <p> 
                            <label>Merk</label> <br>
                            <input class="boxisi" type="text" name="merk" value="{{ $produk->merk }}">
                        </p>
                        <p> 
                            <label>Display</label> <br>
                            <input class="boxisi" type="text" name="cpu" value="{{ $produk->display }}">
                        </p>
                        <p> 
                            <label>Sistem Operasi</label> <br>
                            <input class="boxisi" type="text" name="os" value="{{ $produk->os }}">
                        </p>
                        <div class="form-group"> 
                            <label for="id_kategori">Tipe Produk</label> <br>
                            <select name="id_kategori" class="form-control">
                                <option value="" selected>Pilih Produk</option>
                                @foreach($data_kategori as $kategori)
                                    <option value="{{$kategori->id}}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <p> 
                            <label>Harga Sewa</label> <br>
                            <input class="boxisi" type="text" name="harga" value="{{ $produk->harga }}">
                        </p>
                        <p> 
                            <label>Jumlah Unit</label> <br>
                            <input class="boxisi" type="text" name="jml_unit" value="{{ $produk->jml_unit }}">
                        </p>
                        <div>
                            <button class="btn btn-warning" type="submit">Simpan</button>
                            <a class="btn btn-success" href="/adminProdukLain"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection