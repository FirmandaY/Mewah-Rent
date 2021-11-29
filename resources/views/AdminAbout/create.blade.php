@extends('layouts.app')

@section('content')
<html>
    <head>
     
    </head>
    <body>

        

        <div class="container">
            <h4>Tambah Produk PC</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data PC Berikut :</legend>
                    <form method="post" action="{{route('adminAbout.store')}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Gambar</label> <br>
                            <input class="boxisi" type="file" name="foto">
                        </p>
                        <p> 
                            <label>Tentang Kami</label> <br>
                            <textarea class="boxisi" type="textarea" name="tentangkami" id="tentangkami" value="">
                                Ceritakan tentang Mewah...
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace( 'tentangkami' );
                            </script>
                        </p>
                        
                        <div>
                            <button type="submit">Simpan</button>
                            <a href="/adminAbout"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection