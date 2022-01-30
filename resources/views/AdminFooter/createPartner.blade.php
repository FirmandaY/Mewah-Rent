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
            <h4>Tambahkan Instansi Partner Bisnis</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-container">
                <h4>Silahkan Lengkapi Data Partner Berikut :</h4>
                <form method="post" action="{{route('adminPartner.store')}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label><strong>Gambar/Logo Instansi</strong></label> <br>
                        <input id="inpFile" class="boxisi" type="file" name="foto"><br>
                        <i>*gambar maksimal 5MB</i>
                        <div class="preview-box" id="imagePreview">
                            <img src="" class="preview-img" alt="Image Preview">
                            <span class="preview-text">Image Preview</span>
                        </div>
                        <label><input type="radio" name="display" value="16:9" checked><strong>Landscape</strong></label> <br>
                        <label><input type="radio" name="display" value="1:1"><strong>Persegi</strong></label>
                    </p>
                    <p> 
                        <label><strong>Nama Instansi</strong></label> <br>
                        <input class="boxisi" type="text" name="instansi" placeholder="Nama Bank, Nama Perusahaan, etc." value="{{ old('instansi') }}">
                    </p>
                    <p> 
                        <label><strong>Link Official Instansi</strong></label> <br>
                        <textarea class="boxisi-footer" type="textarea" name="link" placeholder="namaInstansi.com" value="">{{old('link')}}</textarea>
                    </p>
                    <div>
                        <button class="btn btn-warning" type="submit">Simpan</button>
                        <a class="btn btn-success" href="{{ route('adminFooter') }}"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

@endsection