@extends('layouts.app')

@section('content')
<html>
    <head>
     
    </head>
    <body>

        

        <div class="container">
            <h4>Tambah Produk Laptop</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data Laptop Berikut :</legend>
                    <form method="post" action="{{route('adminLaptop.store')}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Gambar</label> <br>
                            <input class="boxisi" type="file" name="gambar">
                        </p>
                        <p> 
                            <label>Merk</label> <br>
                            <input class="boxisi" type="text" name="merk">
                        </p>
                        <p> 
                            <label>Display</label> <br>
                            <input class="boxisi" type="text" name="display">
                        </p>
                        <p> 
                            <label>Prosessor</label> <br>
                            <input class="boxisi" type="text" name="cpu" >
                        </p>
                        <p> 
                            <label>Kartu Grafis</label> <br>
                            <input class="boxisi" type="text" name="gpu">
                        </p>
                        <p> 
                            <label>RAM</label> <br>
                            <input class="boxisi" type="text" name="ram">
                        </p>
                        <p> 
                            <label>Penyimpanan</label> <br>
                            <input class="boxisi" type="text" name="storage">
                        </p>
                        <p> 
                            <label>Sistem Operasi</label> <br>
                            <input class="boxisi" type="text" name="os">
                        </p>
                        <p> 
                            <label>Deskripsi</label> <br>
                            <textarea class="boxisi" name="deskripsi"></textarea>
                        </p>
                        <p> 
                            <label>Harga Sewa</label> <br>
                            <input class="boxisi" type="text" name="harga">
                        </p>
                        <p> 
                            <label>Jumlah Unit</label> <br>
                            <input class="boxisi" type="text" name="jml_unit">
                        </p>
                        <div>
                            <button type="submit">Simpan</button>
                            <a href="/adminLaptop"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection