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
            <h4>Edit Instansi Partner Bisnis</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-container">
                <legend>Silahkan Lengkapi Data Instansi Berikut :</legend>
                <form method="post" action="{{route('adminPartner.update',$partner->id)}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label><strong>Gambar/Logo Instansi</strong></label> <br>
                        <input id="inpFile" class="boxisi" type="file" name="foto" value="{{ asset('thumb/'.$partner->foto) }}">
                        <br>
                        <i>*gambar maksimal 5MB</i>
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
                                        <img class="last-img" src="{{ asset('thumb/'.$partner->foto) }}">
                                    </div>
                                    <div class="desc-text">
                                        <p>Gambar Saat Ini</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <label><input type="radio" name="display" value="16:9" checked>Landscape</label> <br>
                        <label><input type="radio" name="display" value="1:1">Persegi</label>
                    </p>
                    <p> 
                        <label><strong>Nama Instansi</strong></label> <br>
                        <input class="boxisi" type="text" name="instansi" value="{{ $partner->instansi }}">
                    </p>
                    <p> 
                        <label><strong>Link Official Instansi</strong></label> <br>
                        <textarea class="boxisi-footer" type="textarea" name="link" placeholder="namaInstansi.com" value="">{{ $partner->link }}</textarea>
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