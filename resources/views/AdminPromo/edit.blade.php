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
            <h4>Edit Koleksi Galeri Produk</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data Galeri Berikut :</legend>
                    <form method="post" action="{{route('adminPromo.update',$promo->id)}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label><strong>Gambar</strong></label> <br>
                            <input class="boxisi" type="file" name="gambar_promo" value="{{ asset('thumb/'.$promo->gambar_promo) }}">
                            <br>
                            <i>*gambar maksimal 5MB | dimensi 1920 x 1280</i>
                        </p>
                        <p> 
                            <label><strong>Judul Gambar</strong></label> <br>
                            <input class="boxisi" type="text" name="judul_promo" value="{{ $promo->judul_promo }}">
                        </p>
                        <p> 
                            <label>Deskripsi Gambar</label> <br>
                            <textarea class="boxisi" type="textarea" name="deskripsi_promo" id="deskripsi_promo" value="">
                                {!! $promo->deskripsi_promo !!}
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace( 'deskripsi_promo' );
                            </script>
                        </p>
                        <div>
                            <button class="btn btn-warning" type="submit">Simpan</button>
                            <a class="btn btn-success" href="/adminPromo"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection