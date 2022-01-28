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
                <form method="post" action="{{route('adminSosial.update',$sosial->id)}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label><strong>Media Sosial</strong></label> <br>
                        <input class="boxisi" type="text" name="media" placeholder="Instagram, Facebook, Youtube, etc." value="{{$sosial->media}}"></input>
                    </p>
                    <p> 
                        <label><strong>Username</strong></label> <br>
                        <input class="boxisi" type="text" name="username" placeholder="Rent_M, AyuIn, RentMOfficial, etc." value="{{$sosial->username}}"></input>
                    </p>
                    <p> 
                        <label><strong>Link Media Sosial</strong></label> <br>
                        <textarea class="boxisi-footer" type="textarea" name="link" placeholder="https://www.instagram.com/Mr.example/" value="">{{$sosial->link}}</textarea>
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