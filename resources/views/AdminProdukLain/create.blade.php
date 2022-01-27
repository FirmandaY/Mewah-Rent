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
            <h4>Tambah Produk Baru</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-container">
                <h4>Silahkan Lengkapi Data Produk Berikut :</h4>
                <form method="post" action="{{route('adminProdukLain.store')}}" enctype="multipart/form-data">
                @csrf
                    <p> 
                        <label><strong>Gambar</strong></label> <br>
                        <input id="inpFile" class="boxisi" type="file" name="gambar"><br>
                        <i>*gambar disarankan landscape, 1920 x 1280, max:5MB</i>
                        <div class="preview-box" id="imagePreview">
                            <img src="" class="preview-img" alt="Image Preview">
                            <span class="preview-text">Image Preview</span>
                        </div>
                    </p>
                    <p> 
                        <label><strong>Merk</strong></label> <br>
                        <input class="boxisi" type="text" name="merk" placeholder="ASUS, DELL, dsb." value="{{ old('merk') }}">
                    </p>
                    <div class="form-group"> 
                        <label for="id_kategori"></strong>Tipe Produk<strong></label> <br>
                        <select name="id_kategori" class="boxisi">
                            <option value="" selected>Pilih Produk</option>
                            @foreach($data_kategori as $kategori)
                                <option value="{{$kategori->id}}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <p> 
                        <label><strong>Display</strong></label> <br>
                        <input class="boxisi" type="text" name="display" placeholder="9inch, 11inch, dsb." value="{{ old('display') }}">
                    </p>
                        <label><strong>Sistem Operasi</strong></label> <br>
                        <input class="boxisi" type="text" name="os" placeholder="Windows, Android, CMOS, dsb." value="{{ old('os') }}">
                    </p>
                    <p> 
                        <label><strong>Deskripsi Produk</strong></label> <br>
                        <textarea class="boxisi" type="textarea" name="deskripsi" id="deskripsi" value="">
                            Deskripsi lebih lengkap/detail tentang produk ini... {{ old('deskripsi') }}
                        </textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace( 'deskripsi' );
                        </script>
                    </p>
                    <p> 
                        <label><strong>Harga Sewa</strong></label> <br>
                        <input class="boxisi" type="text" name="harga" placeholder="Jika ingin diisi, tuliskan nominal saja contoh: 150000" value="{{ old('harga') }}">
                    </p>
                    <p> 
                        <label><strong>Jumlah Unit</strong></label> <br>
                        <input class="boxisi" type="text" name="jml_unit" placeholder= "1,2,3, dsb." value="{{ old('jml_unit') }}">
                    </p>
                    <div>
                        <button class="btn btn-warning" type="submit">Simpan</button>
                        <a class="btn btn-success" href="{{ route('adminProdukLain') }}"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

@endsection