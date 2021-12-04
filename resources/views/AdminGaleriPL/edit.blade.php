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
            <h4>Edit Koleksi Galeri Produk</h4>
            @if (count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset>
                <legend>Silahkan Lengkapi Data Galeri Berikut :</legend>
                    <form method="post" action="{{route('adminGaleriPL.update',$galeripl->id)}}" enctype="multipart/form-data">
                    @csrf
                        <p> 
                            <label><strong>Gambar</strong></label> <br>
                            <input id="inpFile" class="boxisi" type="file" name="foto" value="{{ asset('thumb/'.$galeripl->foto) }}">
                            <br>
                            <i>*gambar maksimal 5MB | dimensi 1920 x 1280</i>
                            <div class="preview-box" id="imagePreview">
                                <img src="" class="preview-img" alt="Image Preview">
                                <span class="preview-text">Image Preview</span>
                            </div>
                        </p>
                        <p> 
                            <label><strong>Judul Gambar</strong></label> <br>
                            <input class="boxisi" type="text" name="nama_galeri" value="{{ $galeripl->nama_galeri }}">
                        </p>
                        <div class="form-group"> 
                            <label for="id_produk"><strong>Merk Produk</strong></label> <br>
                            <select name="id_produk" class="boxisi">
                                <option value="" selected>Pilih Produk</option>
                                @foreach($data_produk as $produk)
                                    <option value="{{$produk->id}}">{{ $produk->merk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <p> 
                            <label>Deskripsi Gambar</label> <br>
                            <textarea class="boxisi" type="textarea" name="keterangan" id="keterangan" value="">
                                {!! $galeripl->keterangan !!}
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace( 'keterangan' );
                            </script>
                        </p>
                        <div>
                            <button class="btn btn-warning" type="submit">Simpan</button>
                            <a class="btn btn-success" href="/adminGaleriPL"> Batal </a>
                        </div>
                    </form>
                </legend>
            </fieldset>
        </div>

        <script>
            const inpFile = document.getElementById("inpFile");
            const previewContainer = document.getElementById("imagePreview");
            const previewImage = previewContainer.querySelector(".preview-img");
            const previewDefaultText = previewContainer.querySelector(".preview-text");

            inpFile.addEventListener("change", function(){
                const file = this.files[0];

                if(file){
                    const reader = new FileReader();
                    previewDefaultText.style.display = "none";
                    previewImage.style.display = "block"

                    reader.addEventListener("load", function(){
                        previewImage.setAttribute("src", this.result);
                    });
                    reader.readAsDataURL(file);
                }else{
                    previewDefaultText.style.display = null;
                    previewImage.style.display = null;
                    previewImage.setAttribute("src", "")

                }
            });
        </script>

    </body>
</html>

@endsection