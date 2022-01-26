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
            <h4>Edit Promo Kita</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-container">
                <legend>Silahkan Lengkapi Data Promo Berikut :</legend>
                <form method="post" action="{{route('adminPromo.update',$promo->id)}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label><strong>Gambar</strong></label> <br>
                        <input id="inpFile" class="boxisi" type="file" name="gambar_promo" value="{{ asset('thumb/'.$promo->gambar_promo) }}">
                        <br>
                        <i>*gambar maksimal 5MB | dimensi 1920 x 1280</i>
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
                                        <img class="last-img" src="{{ asset('thumb/'.$promo->gambar_promo) }}">
                                    </div>
                                    <div class="desc-text">
                                        <p>Gambar Saat Ini</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
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
                        <a class="btn btn-success" href="{{ route('adminPromo') }}"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

@endsection