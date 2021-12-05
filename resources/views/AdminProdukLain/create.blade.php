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
            <fieldset>
                <legend>Silahkan Lengkapi Data Produk Berikut :</legend>
                    <form method="post" action="{{route('adminProdukLain.store')}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label>Gambar</label> <br>
                            <input id="inpFile" class="boxisi" type="file" name="gambar">
                            <i>*gambar disarankan landscape, 1920 x 1280, max:5MB</i>
                            <div class="preview-box" id="imagePreview">
                                <img src="" class="preview-img" alt="Image Preview">
                                <span class="preview-text">Image Preview</span>
                            </div>
                        </p>
                        <p> 
                            <label>Merk</label> <br>
                            <input class="boxisi" type="text" name="merk" placeholder="ASUS, DELL, dsb.">
                        </p>
                        <div class="form-group"> 
                            <label for="id_kategori">Tipe Produk</label> <br>
                            <select name="id_kategori" class="boxisi">
                                <option value="" selected>Pilih Produk</option>
                                @foreach($data_kategori as $kategori)
                                    <option value="{{$kategori->id}}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <p> 
                            <label>Display</label> <br>
                            <input class="boxisi" type="text" name="display" placeholder="Intel, AMD, dsb.">
                        </p>
                            <label>Sistem Operasi</label> <br>
                            <input class="boxisi" type="text" name="os" placeholder="Windows, Mac, Linux, dsb.">
                        </p>
                        <p> 
                            <label>Deskripsi Produk</label> <br>
                            <textarea class="boxisi" type="textarea" name="deskripsi" id="deskripsi" value="">
                                Ceritakan tentang produk ini...
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace( 'deskripsi' );
                            </script>
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
                            <button class="btn btn-warning" type="submit">Simpan</button>
                            <a class="btn btn-success" href="/adminProdukLain"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>
    </body>
</html>

@endsection