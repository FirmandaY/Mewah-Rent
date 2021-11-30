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
            <fieldset>
                <legend>Silahkan Lengkapi Data Galeri Produk Berikut :</legend>
                    <form method="post" action="{{route('adminGaleriPL.store')}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Gambar</label> <br>
                            <input class="boxisi" type="file" name="foto">
                            <i>*gambar maksimal 5MB | dimensi 1920 x 1280</i>
                        </p>
                        <p> 
                            <label>Judul Foto</label> <br>
                            <input class="boxisi" type="text" name="nama_galeri" placeholder="ASUS, DELL, dsb.">
                        </p>
                        <div class="form-group"> 
                            <label for="id_produk">Merk Produk</label> <br>
                            <select name="id_produk" class="form-control">
                                <option value="" selected>Pilih Produk</option>
                                @foreach($data_produk as $produk)
                                    <option value="{{$produk->id}}">{{ $produk->merk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <p> 
                            <label>Deskripsi Galeri</label> <br>
                            <textarea class="boxisi" type="textarea" name="keterangan" id="keterangan" value="">
                                Ceritakan tentang gambar ini...
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace( 'keterangan' );
                            </script>
                        </p>
                        <div>
                            <button class="btn btn-warning" type="submit">Simpan</button>
                            <a class="btn btn-success" href="/adminGaleriPL"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection