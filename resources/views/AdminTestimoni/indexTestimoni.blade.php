@extends('layouts.app')

@section('content')

        @if(Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @elseif(Session::has('pesanHapus'))
            <div class="alert alert-danger">{{ Session::get('pesanHapus') }}</div>
        @endif
        <div class="flex-center position-ref">
            
            <div class="content">

                <div class="title m-b-md">
                    Testimoni
                </div>
                <div>
                  <a class="btn btn-primary" href="{{ route('adminTestimoni.create') }}">  
                     <i class="fa fa-plus-square-o" style="font-size:12px"></i>
                     Tambah Testimoni
                  </a>
                  
               </div>

                <table class="table table-striped" border="2" align="center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sumber Testimoni</th>
                            <th>Testimoni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_testimoni as $testimoni)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $testimoni->sumber }}</td>
                                <td>{!! $testimoni->testimoni !!}</td>
                                <td>
                                    <form action="{{ route('adminTestimoni.destroy', $testimoni->id) }}" method="post">
                                        @csrf
                                        <a class="btn-edit btn-primary" href="{{ route('adminTestimoni.edit', $testimoni->id) }}"> 
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
                    <tr>
                        <td rowspan="2" colspan="2">Keterangan</td>
                       
                    </tr>
                    <tr>
                        <td colspan='5'> Total Post = {{ $jml_testimoni }} </td>
                    </tr>

                </table> 
                <div>{{$data_testimoni->links()}}</div>
            </div>
        </div>

@endsection