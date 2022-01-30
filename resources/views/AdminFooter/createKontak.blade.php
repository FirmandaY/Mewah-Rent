@extends('layouts.app')

@section('content')
<html>
    <head>
     
    </head>
    <body>
       
        <div class="container">
            <h4>Tambahkan Kontak Mewah-Rent</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-container">
                <h4>Silahkan Lengkapi Data Kontak Berikut :</h4>
                <form method="post" action="{{route('adminKontak.store')}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label><strong>Nomor Telepon</strong></label> <br>
                        <textarea class="boxisi-footer" type="textarea" name="no_telp" placeholder="Awali dengan 62! contoh: 628xxxxxxxxx" value="">{{old('no_telp')}}</textarea>
                        <br>
                        <label><input type="radio" name="tipe" value="ya" checked><strong>Sambung WhatsApp</strong></label> <br>
                        <label><input type="radio" name="tipe" value="tidak"><strong>Tanpa WhatsApp</strong></label>
                    </p>
                    <p> 
                        <label><strong>Alamat Email</strong></label> <br>
                        <textarea class="boxisi-footer" type="textarea" name="email" placeholder="contohemail@gmail.com" value="">{{old('email')}}</textarea>
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