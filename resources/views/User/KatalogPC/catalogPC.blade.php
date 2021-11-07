@extends('User.masterCatalog')

@section('banner')
<div class="banner_main">
    <div class="container">
        <div class="row">
            <div class="col-md-9 padding_right1">
            <!--ini adalah wadah untuk bentuk banner utama-->
                <h1 class="titleAbout">Daftar Produk PC</h1>
            <!--<h1>Tempatnya Sewa</h1>-->
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($data_pc as $pc)
        <div class="col-md-4">
            <div class="card" style="margin-bottom: 50px;">
                <img src="images/macbook.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $pc->merk }}</h5>
                    <strong class="item-count">Ready : {{ $pc->jml_unit }} Unit</strong>
                    <p class="card-text">"{{ $pc->deskripsi }}"</p>
                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection