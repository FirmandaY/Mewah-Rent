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
            <h4>Edit Kontak</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            
            <div class="form-container">
                <h4>Silahkan Lengkapi Data Kontak Berikut :</h4>
                <form method="post" action="{{route('adminKontak.update',$kontak->id)}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label><strong>Nomor Telepon</strong></label> <br>
                        <textarea class="boxisi-footer" type="textarea" name="no_telp" placeholder="08xxxxxxxxx" value="{{old('no_telp')}}">{{ $kontak->no_telp }}</textarea>
                    </p>
                    <p> 
                        <label><strong>Alamat Email</strong></label> <br>
                        <textarea class="boxisi-footer" type="textarea" name="email" placeholder="contohemail@gmail.com" value="{{old('email')}}">{{ $kontak->email }}</textarea>
                    </p>
                    <div>
                        <button class="btn btn-warning" type="submit">Simpan</button>
                        <a class="btn btn-success" href="{{ route('adminFooter') }}"> Batal </a>
                        <!--adminFooter adalah index dari semua komponen di dalam footer, termasuk map, kontak, dan sosmed.-->
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

@endsection