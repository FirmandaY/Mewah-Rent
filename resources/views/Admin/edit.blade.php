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
                    <form method="post" action="{{route('adminPC.update',$pc->id)}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Gambar</label> <br>
                            <input class="boxisi" type="file" name="gambar" value="{{ url('/data_file/'.$pc->gambar) }}">
                        </p>
                        <p> 
                            <label>Merk</label> <br>
                            <input class="boxisi" type="text" name="merk" value="{{ $pc->merk }}">
                        </p>
                        <p> 
                            <label>Prosessor</label> <br>
                            <input class="boxisi" type="text" name="cpu" value="{{ $pc->cpu }}">
                        </p>
                        <p> 
                            <label>Kartu Grafis</label> <br>
                            <input class="boxisi" type="text" name="gpu" value="{{ $pc->gpu }}">
                        </p>
                        <p> 
                            <label>RAM</label> <br>
                            <input class="boxisi" type="text" name="ram" value="{{ $pc->ram }}">
                        </p>
                        <p> 
                            <label>Penyimpanan</label> <br>
                            <input class="boxisi" type="text" name="storage" value="{{ $pc->storage }}">
                        </p>
                        <p> 
                            <label>Sistem Operasi</label> <br>
                            <input class="boxisi" type="text" name="os" value="{{ $pc->os }}">
                        </p>
                        <p> 
                            <label>Deskripsi</label> <br>
                            <textarea class="boxisi" name="deskripsi" value="{{ $pc->deskripsi }}"></textarea>
                        </p>
                        <p> 
                            <label>Harga Sewa</label> <br>
                            <input class="boxisi" type="text" name="harga" value="{{ $pc->harga }}">
                        </p>
                        <p> 
                            <label>Jumlah Unit</label> <br>
                            <input class="boxisi" type="text" name="jml_unit" value="{{ $pc->jml_unit }}">
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