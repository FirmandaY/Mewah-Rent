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
                    <form method="post" action="{{route('adminPC.store')}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Gambar</label> <br>
                            <input class="boxisi" type="file" name="gambar">
                        </p>
                        <p> 
                            <label>Merk</label> <br>
                            <input class="boxisi" type="text" name="merk" placeholder="ASUS, DELL, dsb.">
                        </p>
                        <p> 
                            <label>Prosessor</label> <br>
                            <input class="boxisi" type="text" name="cpu" placeholder="Intel, AMD, dsb.">
                        </p>
                        <p> 
                            <label>Kartu Grafis</label> <br>
                            <input class="boxisi" type="text" name="gpu" placeholder="NVIDIA, AMD, dsb.">
                        </p>
                        <p> 
                            <label>RAM</label> <br>
                            <input class="boxisi" type="text" name="ram" placeholder="XXX GB">
                        </p>
                        <p> 
                            <label>Penyimpanan</label> <br>
                            <input class="boxisi" type="text" name="storage" placeholder="XXX GB">
                        </p>
                        <p> 
                            <label>Sistem Operasi</label> <br>
                            <input class="boxisi" type="text" name="os" placeholder="Windows, Mac, Linux, dsb.">
                        </p>
                        <p> 
                            <label>Deskripsi</label> <br>
                            <textarea class="boxisi" name="deskripsi" placeholder="Ceritakan tentang produk ini.."></textarea>
                        </p>
                        <p> 
                            <label>Harga Sewa</label> <br>
                            <input class="boxisi" type="text" name="harga" placeholder="Rp.XXX">
                        </p>
                        <p> 
                            <label>Jumlah Unit</label> <br>
                            <input class="boxisi" type="text" name="jml_unit" placeholder= "1,2,3, dsb.">
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