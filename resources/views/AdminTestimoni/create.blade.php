@extends('layouts.app')

@section('content')
<html>
    <head>
     
    </head>
    <body>
        <div class="container">
            <h4>Tambah Testimoni dari Orang Terkenal</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data Testimoni Berikut :</legend>
                    <form method="post" action="{{route('adminTestimoni.store')}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Narasumber</label> <br>
                            <input class="boxisi" type="text" name="sumber">
                        </p>
                        <p> 
                            <label>Testimoni Mereka</label> <br>
                            <textarea class="boxisi" type="textarea" name="testimoni" id="testimoni" value="">
                                Kualitas barangnya bagus! Dan harga terjangkau!
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace( 'testimoni' );
                            </script>
                        </p>
                        
                        <div>
                            <button type="submit">Simpan</button>
                            <a href="/adminTestimoni"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection