@extends('layouts.app')

@section('content')
<html>
    <head>
        
    </head>
    <body>

        <div class="container">
            <h4>Ubah Pesan Halaman FAQ</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-container">
                <h4>Silahkan Lengkapi Data FAQ Berikut :</h4>
                <form method="post" action="{{route('adminFAQ.update',$faq->id)}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label>Pertanyaan</label> <br>
                        <input class="boxisi" type="text" name="pertanyaan" value="{{ $faq->pertanyaan }}">
                    </p>
                    <p> 
                        <label>Jawaban</label> <br>
                        <textarea class="boxisi" type="textarea" name="jawaban" id="faq" value="{{ $faq->jawaban }}">
                            {{ $faq->jawaban }}
                        </textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace( 'faq' );
                        </script>
                    </p>
                    <div>
                        <button class="btn btn-warning" type="submit">Simpan</button>
                        <a class="btn btn-success" href="{{ route('adminFAQ') }}"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

@endsection