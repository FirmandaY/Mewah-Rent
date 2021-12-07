@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref">
            
            <div class="content">

                <div class="title m-b-md">
                    Pesan Dari Pengunjung
                </div>

                <table class="table table-striped" border="2" align="center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Nama</th>
                            <th>No-Telpon</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_pesan as $pesan)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $pesan->id }}</td>
                                <td>{{ $pesan->nama }}</td>
                                <td>{{ $pesan->no_telpon }}</td>
                                <td>{{ $pesan->email }}</td>
                                <td>{{ $pesan->pesan_user }}</td>
                                <td>
                                    {{ $pesan->created_at->format('l, d-m-Y') }} <br>
                                    {{ $pesan->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <form action="{{ route('adminPesan.destroy', $pesan->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" onClick="return confirm ('Yakin mau dihapus?')"> Hapus </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <td rowspan="2" colspan="2">Keterangan</td>
                       
                    </tr>
                    <tr>
                        <td colspan='5'> Total Pesan = {{ $jml_pesan }} </td>
                    </tr>

                </table> 
                <div>{{$data_pesan->links()}}</div>
            </div>
        </div>

@endsection