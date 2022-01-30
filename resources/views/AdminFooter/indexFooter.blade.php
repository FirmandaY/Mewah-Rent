@extends('layouts.app')

@section('content')
<html>
    <head>
       
    </head>
    <body>
         
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @elseif(Session::has('pesanHapus'))
            <div class="alert alert-danger">{{ Session::get('pesanHapus') }}</div>
        @endif
        <div class="title m-b-md">
            Admin Bagian Footer
        </div>
        <div class="container con-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Alamat Mewah Rent</h2>
                    </div>
                    <div>
                    <a class="btn btn-primary" href="{{ route('adminLokasi.create') }}">  
                        <i class="fa fa-plus-square-o" style="font-size:12px"></i>
                        Tambah Lokasi
                    </a>
                    <br><br>
                    </div>
                    
                    <section>
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach($data_lokasi as $lokasi)
                            <div class="col-md-6">
                                <div class="card" style="
                                    margin-bottom: 50px; 
                                    padding:5px; 
                                    background-color:#ebebeb7e; 
                                    border:2px solid #000;
                                    border-radius:10px;"
                                    >

                                    <iframe src="{{$lokasi->map}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    <div class="card-body">
                                        <h5 class="card-title">Alamat</h5>
                                        <strong class="item-count">{{ $lokasi->alamat }}</strong>
                                        
                                        <form action="{{ route('adminLokasi.destroy', $lokasi->id) }}" method="post">
                                            @csrf
                                            <a class="btn-edit btn-warning" href="{{ route('adminLokasi.edit', $lokasi->id) }}" onClick="return confirm ('Yakin mau diubah?')"
                                            style="padding-right:8px; padding-left:8px;"
                                            > 
                                            Edit
                                            <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="btn-delete btn-danger" onClick="return confirm ('Yakin mau dihapus?')"
                                            style="padding-right:5px; padding-left:5px;"
                                            >
                                            <i class="fa fa-trash"></i>Hapus 
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    </section>
                    
                    
                </div>
            </div>
            <div>{{$data_lokasi->links()}}</div>
                
        </div>

        <div class="flex-center position-ref con-footer">
            
            <div class="content">

                <div class="titlepage">
                    <h2>Kontak Mewah Rent</h2>
                </div>
                <div>
                  <a class="btn btn-primary" href="{{ route('adminKontak.create') }}">  
                     <i class="fa fa-plus-square-o" style="font-size:12px"></i>
                     Tambah Kontak
                  </a>
                  
               </div>

                <table class="table table-striped" border="2" align="center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_kontak as $kontak)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $kontak->no_telp }}</td>
                                <td>{{ $kontak->email }}</td>
                                <td>
                                    <form action="{{ route('adminKontak.destroy', $kontak->id) }}" method="post">
                                        @csrf
                                        <a class="btn-edit btn-primary" href="{{ route('adminKontak.edit', $kontak->id) }}" onClick="return confirm ('Yakin mau diubah?')"> 
                                            Edit
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button class="btn-delete btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                            <i class="fa fa-trash"></i>Hapus 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table> 
                <div>{{$data_kontak->links()}}</div>
            </div>
        </div>

        <div class="flex-center position-ref con-footer">
            
            <div class="content">

                <div class="titlepage">
                    <h2>Media Sosial Mewah Rent</h2>
                </div>
                <div>
                  <a class="btn btn-primary" href="{{ route('adminSosial.create') }}">  
                     <i class="fa fa-plus-square-o" style="font-size:12px"></i>
                     Tambah Media Sosial
                  </a>
                  
               </div>

                <table class="table table-striped" border="2" align="center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Media Sosial</th>
                            <th>Username</th>
                            <th>Link Media</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_sosial as $sosial)
                            <tr>
                                <td>{{ ++$no2 }}</td>
                                <td>{{ $sosial->media }}</td>
                                <td>{{ $sosial->username }}</td>
                                <td>{{ $sosial->link }}</td>
                                <td>
                                    <form action="{{ route('adminSosial.destroy', $sosial->id) }}" method="post">
                                        @csrf
                                        <a class="btn-edit btn-primary" href="{{ route('adminSosial.edit', $sosial->id) }}" onClick="return confirm ('Yakin mau diubah?')"> 
                                            Edit
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button class="btn-delete btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                            <i class="fa fa-trash"></i>Hapus 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table> 
                <div>{{$data_sosial->links()}}</div>
            </div>
        </div>

        <div class="flex-center position-ref con-footer">
            
            <div class="content">

                <div class="titlepage">
                    <h2>Partner Bisnis Mewah Rent</h2>
                </div>
                <div>
                  <a class="btn btn-primary" href="{{ route('adminPartner.create') }}">  
                     <i class="fa fa-plus-square-o" style="font-size:12px"></i>
                     Tambah Partner Bisnis
                  </a>
                  
               </div>

                <table class="table table-striped" border="2" align="center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Instansi</th>
                            <th>Link Official</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($data_partner as $partner)
                            <tr>
                                <td rowspan="2">{{ ++$no3 }}</td>
                                <td rowspan="2">
                                    @if($partner->display == '1:1')
                                        <a href="{{ asset('thumb/'.$partner->foto) }}" data-lightbox="image-1" data-title="{{ $partner->instansi }}">
                                            <img src="{{ asset('thumb/'.$partner->foto) }}" style="width: 150px; height: 150px" >
                                        </a>
                                    @else
                                        <a href="{{ asset('thumb/'.$partner->foto) }}" data-lightbox="image-1" data-title="{{ $partner->instansi }}">
                                            <img src="{{ asset('thumb/'.$partner->foto) }}" style="width: 250px; height: 150px" >
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $partner->instansi }}</td>
                                <td>{{ $partner->link }}</td>
                                
                            </tr>

                            <tr>
                                <th>Aksi</th>
                                <td>
                                    <form action="{{ route('adminPartner.destroy', $partner->id) }}" method="post">
                                        @csrf
                                        <a class="btn-edit btn-primary" href="{{ route('adminPartner.edit', $partner->id) }}" onClick="return confirm ('Yakin mau diubah?')"> 
                                            Edit
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button class="btn-delete btn-danger" onClick="return confirm ('Yakin mau dihapus?')">
                                            <i class="fa fa-trash"></i>Hapus 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr ><td colspan="4"></td></tr>
                        @endforeach
                    </tbody>

                </table> 
                <div>{{$data_partner->links()}}</div>
            </div>
        </div>
        
    </body>
</html>

@endsection