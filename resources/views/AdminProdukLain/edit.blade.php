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
            <div class="form-container">
                <h4>Silahkan Lengkapi Data Produk Berikut :</h4>
                <form method="post" action="{{route('adminProdukLain.update',$produk->id)}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label><strong>Gambar</strong></label> <br>
                        <input id="inpFile" class="boxisi" type="file" name="gambar" value="{{ url('/data_file/'.$produk->gambar) }}">
                        <br>
                        <i>*gambar maksimal 5MB | dimensi 1920 x 1080</i>
                        <div class="container">
                            <div class="row">
                                <div class="preview-container">
                                    <div class="" id="imagePreview">
                                        <img src="" class="preview-img" alt="Image Preview">
                                        <span class="preview-text">Image Preview</span>
                                    </div>
                                    <div class="desc-text">
                                        <p>Gambar Baru (Update)</p>
                                    </div>
                                </div>
                                <div  class="preview-container">
                                    <div class="">
                                        <img class="last-img" src="{{ asset('thumb/'.$produk->gambar) }}">
                                    </div>
                                    <div class="desc-text">
                                        <p>Gambar Saat Ini</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </p>
                    <p> 
                        <label><strong>Merk</strong></label> <br>
                        <input class="boxisi" type="text" name="merk" value="{{ $produk->merk }}">
                    </p>
                    <p> 
                        <label><strong>Display</strong></label> <br>
                        <input class="boxisi" type="text" name="display" value="{{ $produk->display }}">
                    </p>
                    <p> 
                        <label><strong>Sistem Operasi</strong></label> <br>
                        <input class="boxisi" type="text" name="os" value="{{ $produk->os }}">
                    </p>
                    <div class="form-group"> 
                        <label for="id_kategori"><strong>Tipe Produk</strong></label> <br>
                        <select name="id_kategori" class="boxisi">
                            <option value="" selected>Pilih Produk</option>
                            @foreach($data_kategori as $kategori)
                                <option value="{{$kategori->id}}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <p> 
                        <label><strong>Deskripsi Produk</strong></label> <br>
                        <textarea class="boxisi" type="textarea" name="deskripsi" id="deskripsi" value="">
                            {{ $produk->deskripsi }}
                        </textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace( 'deskripsi' );
                        </script>
                    </p>
                    <p> 
                        <label><strong>Harga Sewa</strong></label> <br>
                        <input class="boxisi" type="text" name="harga" value="{{ $produk->harga }}">
                    </p>
                    <p> 
                        <label><strong>Jumlah Unit</strong></label> <br>
                        <input class="boxisi" type="text" name="jml_unit" value="{{ $produk->jml_unit }}">
                    </p>
                    <div>
                        <button class="btn btn-warning" type="submit">Simpan</button>
                        <a class="btn btn-success" href="{{ route('adminProdukLain') }}"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

@endsection