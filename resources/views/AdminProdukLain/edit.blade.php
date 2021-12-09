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
                            <label><strong>Gambar</strong></label> <br>
                            <input id="inpFile" class="boxisi" type="file" name="gambar" value="{{ url('/data_file/'.$produk->gambar) }}">
                            <br>
                            <i>*gambar maksimal 5MB | dimensi 1920 x 1080</i>
                            <div class="preview-box" id="imagePreview">
                                <img src="" class="preview-img" alt="Image Preview">
                                <span class="preview-text">Image Preview</span>
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
                            <label>Deskripsi Produk</label> <br>
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
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection