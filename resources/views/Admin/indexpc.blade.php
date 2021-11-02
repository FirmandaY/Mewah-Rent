<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LiBooks | BookList</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>
        
        
            

            <style>
                html, body {
                background-color: #6cb2eb;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                background-image: url("images/backgroundIndex3.jpg");
                background-attachment: fixed;
                background-size: cover;
                background-repeat: no-repeat;
                        
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #fff;
                
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .home:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }
            .news:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }
            .about:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }
            .product:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }
            .github:hover{
                background-color: gray;
                color: white;
                border-radius: 100px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .alert{
                text-align: center;
            }
            .del{
                background-color: rgb(255, 55, 82);
            }
            .updat{
                background-color: #FDC800;
                padding: 0px 15px 0px 15px;
            }
            .table{
                background-color:rgba(255, 255, 255, 0.807);
            }
        </style>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                        LiBooks
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li><a class="linkin" href="/home">Home</a></li>
                            <li><a class="linkin" href="/buku">Buku</a></li>
                            <li><a class="linkin" href="/about">About</a></li>
                            <li><a class="linkin" href="/news">News</a></li>
                            <li><a class="linkin" href="/product">Product</a></li>
                            <li><a class="linkin" href="/github">GitHub</a></li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @endif

        <div class="flex-center position-ref">
            
            <div class="content">

                <div class="title m-b-md">
                    Daftar PC
                </div>
                
                <table class="table table-striped" border="2" align="center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Gambar</th>
                            <th>Merk</th>
                            <th>Prosessor</th>
                            <th>Kartu Grafis</th>
                            <th>RAM</th>
                            <th>Penyimpanan</th>
                            <th>Sistem Operasi</th>
                            <th>Deskripsi</th>
                            <th>Harga Sewa</th>
                            <th>Jumlah Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_pc as $pc)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $pc->id }}</td>
                                <td>{{ $pc->gambar }}</td>
                                <td>{{ $pc->merk }}</td>
                                <td>{{ $pc->cpu }}</td>
                                <td>{{ $pc->gpu }}</td>
                                <td>{{ $pc->ram }}</td>
                                <td>{{ $pc->storage }}</td>
                                <td>{{ $pc->os }}</td>
                                <td>{{ $pc->deskripsi }}</td>
                                <td>{{ $pc->harga }}</td>
                                <td>{{ $pc->jml_unit }}</td>
                                <!--
                                <td>
                                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                                        @csrf
                                        <button class="del" onClick="return confirm ('Yakin mau dihapus?')"> Hapus </button>
                                    </form>
                                    <form action="{{ route('buku.edit', $buku->id) }}" method="get">
                                        @csrf
                                        <button class="updat" onClick="return confirm ('Yakin mau diubah?')"> Edit </button>
                                    </form>
                                </td>
                                -->
                            </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                
                <!--
                <div>{{$data_pc->links()}}</div>
                <div><strong>Jumlah Buku: {{ $jumlah_pc }}</strong></div>
                <br> <br>
                -->

            </div>
        </div>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    </body>
</html>

