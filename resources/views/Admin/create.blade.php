@extends('layouts.app')

@section('content')
<html>
    <head>
     
    </head>
    <body>

        

        <div class="container">
            <h4>Tambah User</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data User Berikut :</legend>
                    <form method="post" action="{{route('adminPC.store')}}">
                    @csrf
                        <p> 
                            <label>Name</label> <br>
                            <input class="boxisi" type="text" name="name">
                        </p>
                        <p> 
                            <label>Email</label> <br>
                            <input class="boxisi" type="email" name="email">
                        </p>
                        <p> 
                            <label>Password</label> <br>
                            <input class="boxisi" type="password" name="password" >
                        </p>
                        <p> 
                            <label>Level</label> <br>
                            <input class="boxisi" type="text" name="level">
                        </p>
                        <div>
                            <button type="submit">Simpan</button>
                            <a href="/adminPC"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection