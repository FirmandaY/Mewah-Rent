@extends('layouts.app')

@section('content')
<html>
    <head>
     
    </head>
    <body>
       
        <div class="container">
            <h4>Tentukan Lokasi Mewah-Rent</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-container">
                <h4>Silahkan Lengkapi Data Lokasi Berikut :</h4>
                <form method="post" action="{{route('adminLokasi.store')}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label><strong>Alamat</strong></label> <br>
                        <textarea class="boxisi-footer" type="textarea" name="alamat" placeholder="Jalan Kentang km.9... etc." value="">{{old('alamat')}}</textarea>
                    </p>
                    <p> 
                        <label><strong>Link Embed Map</strong></label>
                        <a href="{{ route('helpPage') }}"> 
                            <span class="fa fa-question-circle-o mr-3"></span>
                        </a> <br>
                        <textarea class="boxisi-footer" type="textarea" name="map" placeholder="<iframe https://googlemaps...>" value="">{{old('map')}}</textarea>
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