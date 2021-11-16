<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdukLaptop;
use File;
use Image;

class ProdukLaptopController extends Controller
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
        $data_laptop = ProdukLaptop::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($data_laptop->currentPage()-1);
        $jumlah_laptop = ProdukLaptop::sum('jml_unit');
        $jenis_laptop = ProdukLaptop::count();
        $jumlah_harga = ProdukLaptop::sum('harga');

        return view('AdminLaptop.indexLaptop', compact('data_laptop','no','jumlah_laptop','jenis_laptop','jumlah_harga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminLaptop.create');
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
            'merk' => 'required|string|max:30',
            'display' => 'required|string|max:30',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
            'ram' => 'required|string',
            'storage' => 'required|string',
            'os' => 'required|string',
            'deskripsi' => 'required|string|max:100',
            'harga' => 'required|string',
            'jml_unit' => 'required|string'
        ]);
        
        $laptop = new ProdukLaptop;
        
        $laptop->merk = $request->merk;
        $laptop->display = $request->display;
        $laptop->cpu = $request->cpu;
        $laptop->gpu = $request->gpu;
        $laptop->ram = $request->ram;
        $laptop->storage = $request->storage;
        $laptop->os = $request->os;
        $laptop->deskripsi = $request->deskripsi;
        $laptop->harga = $request->harga;
        $laptop->jml_unit = $request->jml_unit;

        $foto = $request->gambar;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('public/images/', $namafile);

        $laptop->gambar = $namafile;
        $laptop->save();

        return redirect('/adminLaptop')->with('pesan','Data Laptop Berhasil di Tambahkan');
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
        $laptop = ProdukLaptop::find($id);
        return view('AdminLaptop.edit', compact('laptop'));
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
        $laptop = ProdukLaptop::find($id);
        $laptop->merk = $request->merk;
        $laptop->display = $request->display;
        $laptop->cpu = $request->cpu;
        $laptop->gpu = $request->gpu;
        $laptop->ram = $request->ram;
        $laptop->storage = $request->storage;
        $laptop->os = $request->os;
        $laptop->deskripsi = $request->deskripsi;
        $laptop->harga = $request->harga;
        $laptop->jml_unit = $request->jml_unit;

        $foto = $request->gambar;

        if($foto) {
            File::delete('thumb/'.$laptop->gambar); //data foto yang lama dihapus dulu
            $namafile = $foto->getClientOriginalName();
            $data['gambar'] = $namafile; // Update field photo
    
            Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
            $foto->move('public/images/', $namafile);
        }
        
        $laptop->gambar = $namafile;

        $laptop->update();
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
        $laptop = ProdukLaptop::find($id);
        $laptop->delete();
        File::delete('thumb/'.$laptop->gambar);
        return redirect('/adminPC')->with('pesan', 'Data PC Berhasil di Hapus');
    }
}
