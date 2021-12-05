@extends('layouts.app')

@section('content')
<html>
    <head>
        
    </head>
    <body>

        

        <div class="container">
            <h4>Ubah Pesan Halaman About</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data About Berikut :</legend>
                    <form method="post" action="{{route('adminAbout.update',$about->id)}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Gambar</label> <br>
                            <input id="inpFile" class="boxisi" type="file" name="foto" value="{{ url('/data_file/'.$about->foto) }}">
                            <i>*gambar disarankan landscape, 1920 x 1280, max:5MB</i>
                            <div class="preview-box" id="imagePreview">
                                <img src="" class="preview-img" alt="Image Preview">
                                <span class="preview-text">Image Preview</span>
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
                            <a class="btn btn-success" href="/adminAbout"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection