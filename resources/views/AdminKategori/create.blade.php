@extends('layouts.app')

@section('content')
<html>
    <head>
     
    </head>
    <body>
        <div class="container">
            <h4>Tambah Kategori Produk</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data Kategori Berikut :</legend>
                    <form method="post" action="{{route('adminKategori.store')}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label><strong>Nama Kategori</strong></label> <br>
                            <input class="boxisi" type="text" name="nama" placeholder="Nama produk">
                        </p>
                        <p> 
                            <label><strong>Foto Kategori</strong></label> <br>
                            <input id="inpFile" class="boxisi" type="file" name="foto">
                            <br>
                            <i>*gambar disarankan landscape, 1920 x 1280, max:5MB</i>
                            <div class="preview-box" id="imagePreview">
                                <img src="" class="preview-img" alt="Image Preview">
                                <span class="preview-text">Image Preview</span>
                            </div>
                        </p>
                        <p> 
                            <label><strong>Keterangan</strong></label> <br>
                            <textarea class="boxisi" type="textarea" name="keterangan" id="keterangan" value="">
                                Keterangan Kategori...
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace( 'keterangan' );
                            </script>
                        </p>
                        
                        <div>
                            <button type="submit">Simpan</button>
                            <a href="/adminKategori"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection