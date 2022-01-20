@extends('layouts.app')

@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
-->

<div class="container">
    <div class="row">
        <div class="back-dash col-md-12">
            <div class="card-info" tabindex="0">
                <span class="card_infoicon">
                    <i class="fa fa-info "></i>
                </span>
                <h1 class="card__title">Ruang Admin</h1>
                <p class="card__description">
                    Anda dapat mengubah isi konten website Mewah Rental dengan fitur yang ada di sini. Klik ikon (<i class="fa fa-bars"></i>) 
                    pada kiri layar untuk melihat fitur selengkapnya.
                </p>
                
            </div>
            <div class="title-dash m-b-md">
                <img src="{{  asset('images/logomewahfix.png') }}" width="200px" height="150px"><br>
                <p>Selamat Datang di Ruang Admin!</p>
            </div>
            
            <hr color="white">
            <div class="m-b-md">
                
            </div>
            
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            
                            <div class="row">
                                @foreach($data_kategori as $kategori)
                                <div class="col-md-6">
                                    <div class="cardh bg-c-blue order-card">
                                        <div class="card-block">
                                            <h6 class="title-bar"><strong>{{ $kategori->nama }}</strong></h6>
                                            <img src="{{ asset('thumb/'.$kategori->foto) }}" class="card-img-top" width="200px" height="185px" alt="...">
                                            <hr class="line-bar" color="white">
                                            <h5>Jumlah Total Unit<i class="fa fa-cart-plus f-left"></i><span> : {{ $kategori->produklains->sum('jml_unit') }}</span></h5>
                                            <p class="m-b-0">Jumlah Tipe (Merk)<span class="f-right">{{ $kategori->produklains->count('merk') }}</span></p>

                                            <a class="btn btn-success" href="{{ route('kategori.produklain', $kategori->nama) }}">Lihat {{ $kategori->nama }}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                        <div class="box-pesan col-md-4">
                            <div class="pesan-dash" >
                                <h6 class="title-bar" >Pesan Customer <br> Hari Ini</h6>
                                <i class="fa fa-commenting-o" style="font-size:36px; "></i>
                            </div>
                            @foreach($data_pesan as $pesan)
                            
                            <div class="isi-pesan-dash">
                            <i class="envelope-symbol fa fa-envelope-o"> </i>
                                <p><h5>{{ $pesan->nama }}</h5><i>{{ $pesan->created_at->diffForHumans() }}</i></p>
                                
                                <p class="pesan-inti" > <i> "{{ $pesan->pesan_user }}" </i></p>
                            </div>
                            @endforeach
                            <div>{{$data_pesan->links()}}</div>
                        </diV>
                    </div>
                </div>
            </section>
            
            
        </div>
    </div>
         
         
   </div>

@endsection
