@extends('masterCatalog')

@section('banner')
<div class="banner_main">
    <div class="container">
        <div class="row">
            <div class=" titleMaster col-md-12 padding_right1">
            <!--ini adalah wadah untuk bentuk banner utama-->
                <h1 class="title-content">Daftar Produk {{ $kategori->nama }}</h1>
            <!--<h1>Tempatnya Sewa</h1>-->
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($produks as $data)
        <div class="col-md-4">
            <div class="card" style="margin-bottom: 50px;">
                <img src="{{ asset('thumb/'.$data->gambar) }}" class="card-img-top" alt="..." width="200px" height="175px">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->merk }}</h5>
                    <strong class="item-count">Ready : {{ $data->jml_unit }} Unit</strong>
                    <br>
                    <a href="{{ route('user.produkdetail', $data->produklain_seo)}}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>{{$produks->links()}}</div>
</div>


@endsection