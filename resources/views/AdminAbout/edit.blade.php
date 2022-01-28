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
            <h4>Ubah Konten Halaman About Us</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-container">
                <h4>Silahkan Lengkapi Data About Us Berikut :</h4>
                <form method="post" action="{{route('adminAbout.update',$about->id)}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <strong><label>Gambar</label></strong> <br>
                        <input id="inpFile" class="boxisi" type="file" name="foto" value="{{ url('/data_file/'.$about->foto) }}"><br>
                        <i>*gambar disarankan landscape, 1920 x 1280, max:5MB</i>
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
                                        <img class="last-img" src="{{ asset('thumb/'.$about->foto) }}">
                                    </div>
                                    <div class="desc-text">
                                        <p>Gambar Saat Ini</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </p>
                    <p> 
                        <label>Tentang Kami</label> <br>
                        <textarea class="boxisi" type="textarea" name="tentangkami" id="tentangkami" value="">
                            {{ $about->tentangkami }}
                        </textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace( 'tentangkami' );
                        </script>
                    </p>
                    <div>
                        <button class="btn btn-warning" type="submit">Simpan</button>
                        <a class="btn btn-success" href="{{ route('adminAbout') }}"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

@endsection