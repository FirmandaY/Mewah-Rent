<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\ProdukPC;
use App\Kategori;
use File;
use Image;
use Illuminate\Support\Str;

class ProdukPCController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_pc = ProdukPC::orderBy('id','desc')->paginate($batas);
        $data_kategori = Kategori::all();
        $no = $batas * ($data_pc->currentPage()-1);
        $jumlah_pc = ProdukPC::sum('jml_unit');
        $jenis_pc = ProdukPC::count();
        $jumlah_harga = ProdukPC::sum('harga');

        return view('Admin.indexpc', compact('data_pc', 'data_kategori','no','jumlah_pc','jenis_pc','jumlah_harga'));
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_pc = ProdukPC::where('merk','like',"%".$cari."%")->orwhere('cpu', 'like', "%".$cari."%")
        ->paginate($batas);
        $no = $batas * ($data_pc->currentPage()-1);
        $jumlah_pc = ProdukPC::count();
        $jenis_pc = ProdukPC::count();
        $jumlah_harga = ProdukPC::sum('harga');

        return view('Admin.search', compact('data_pc','no','jumlah_pc','jenis_pc','cari','jumlah_harga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::all();
        return view('Admin.create', compact('data_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'merk' => 'required|string',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
            'ram' => 'required|string',
            'storage' => 'required|string',
            'os' => 'required|string',
            'deskripsi' => 'required|string|max:250',
            'harga' => 'required|string',
            'jml_unit' => 'required|string'
        ]);
        
        $pc = new ProdukPC;
        
        $pc->merk = $request->merk;
        $pc->cpu = $request->cpu;
        $pc->gpu = $request->gpu;
        $pc->ram = $request->ram;
        $pc->storage = $request->storage;
        $pc->os = $request->os;
        $pc->deskripsi = $request->deskripsi;
        $pc->harga = $request->harga;
        $pc->jml_unit = $request->jml_unit;
        $pc->pc_seo = Str::slug($request->merk);

        $foto = $request->gambar;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->save('thumb/'.$namafile);
        $foto->move('public/images/', $namafile);

        $pc->gambar = $namafile;
        $pc->save();

        return redirect('/adminPC')->with('pesan','Data PC Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pc = ProdukPC::find($id);
        $data_kategori = Kategori::all();
        return view('Admin.edit', compact('pc', 'data_kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pc = ProdukPC::find($id);
        $pc->merk = $request->merk;
        $pc->cpu = $request->cpu;
        $pc->gpu = $request->gpu;
        $pc->ram = $request->ram;
        $pc->storage = $request->storage;
        $pc->os = $request->os;
        $pc->deskripsi = $request->deskripsi;
        $pc->harga = $request->harga;
        $pc->jml_unit = $request->jml_unit;
        $pc->pc_seo = Str::slug($request->merk);

        $foto = $request->gambar;

        if($foto) {
            File::delete('thumb/'.$pc->gambar); //data foto yang lama dihapus dulu
            $namafile = $foto->getClientOriginalName();
            $data['gambar'] = $namafile; // Update field photo
    
            Image::make($foto)->save('thumb/'.$namafile);
            $foto->move('public/images/', $namafile);
        }
        
        $pc->gambar = $namafile;

        $pc->update();
        return redirect('/adminPC')->with('pesan', 'Perubahan Data PC Berhasil diSimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pc = ProdukPC::find($id);
        $pc->delete();
        File::delete('thumb/'.$pc->gambar);
        File::delete('public/images/'.$pc->gambar);
        return redirect('/adminPC')->with('pesan', 'Data PC Berhasil di Hapus');
    }
}
