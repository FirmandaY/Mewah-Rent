@extends('layouts.app')

@section('content')
<html>
    <head>
        
    </head>
    <body>
        <div class="container">
            <h4>Ubah Kategori Produk</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data Kategori Berikut :</legend>
                    <form method="post" action="{{route('adminKategori.update',$kategori->id)}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Nama Kategori</label> <br>
                            <input class="boxisi" type="text" name="nama" value="{{ $kategori->nama }}">
                        </p>
                        <p> 
                            <label>Foto Kategori</label> <br>
                            <input class="boxisi" type="file" name="foto">
                            <br>
                            <i>Gambar disarankan landscape, 16:9, max:5MB</i>
                        </p>
                        <p> 
                            <label>Keterangan</label> <br>
                            <textarea class="boxisi" type="textarea" name="keterangan" id="keterangan" value="">
                                {{ $kategori->keterangan }}
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace( 'keterangan' );
                            </script>
                        </p>
                        <div>
                            <button class="btn btn-warning" type="submit">Simpan</button>
                            <a class="btn btn-success" href="/adminKategori"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection