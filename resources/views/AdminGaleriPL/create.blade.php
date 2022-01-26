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
            <h4>Tambah Koleksi Galeri Baru</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-container">
                <h4>Silahkan Lengkapi Data Galeri Produk Berikut :</h4>
                <form method="post" action="{{route('adminGaleriPL.store')}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                    <label><strong>Gambar</strong></label> <br>
                        <input id="inpFile" class="boxisi" type="file" name="foto" value="">
                        <br>
                        <i>*gambar maksimal 5MB | dimensi 1920 x 1280</i>
                        <div class="preview-box" id="imagePreview">
                            <img src="" class="preview-img" alt="Image Preview">
                            <span class="preview-text">Image Preview</span>
                        </div>
                    </p>
                    <p> 
                        <label><strong>Judul Foto</strong></label> <br>
                        <input class="boxisi" type="text" name="nama_galeri" placeholder="Contoh Produk dsb." value="{{ old('nama_galeri') }}">
                    </p>
                    <div class="form-group"> 
                        <label for="id_produk"><strong>Merk Produk</strong></label> <br>
                        <select name="id_produk" class="boxisi">
                            <option value="" selected>Pilih Produk</option>
                            @foreach($data_produk as $produk)
                                <option value="{{$produk->id}}">{{ $produk->merk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <p> 
                        <label><strong>Deskripsi Galeri</strong></label> <br>
                        <textarea class="boxisi" type="textarea" name="keterangan" id="keterangan" value="">
                            Ceritakan tentang gambar ini... {{ old('keterangan') }}
                        </textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace( 'keterangan' );
                        </script>
                    </p>
                    <div>
                        <button class="btn btn-warning" type="submit">Simpan</button>
                        <a class="btn btn-success" href="{{ route('adminGaleriPL') }}"> Batal </a>
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>

@endsection