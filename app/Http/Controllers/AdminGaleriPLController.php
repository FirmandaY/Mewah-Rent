<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriPL;
use App\ProdukLain;
use App\Kategori;
use File;
use Image;
use Illuminate\Support\Str;

class AdminGaleriPLController extends Controller
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
        $data_kategori = Kategori::all();
        $batas = 5;
        $data_galeri = GaleriPL::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($data_galeri->currentPage()-1);

        return view('AdminGaleriPL.indexGaleriPL', compact('data_kategori', 'data_galeri' ,'no'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::all();
        $data_produk = ProdukLain::all();
        return view('AdminGaleriPL.create', compact('data_kategori', 'data_produk'));
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
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'nama_galeri' => 'required|string',
            'keterangan' => 'required|string',
        ]);
        
        $galeripl = new GaleriPL;
        
        $galeripl->nama_galeri = $request->nama_galeri;
        $galeripl->keterangan = $request->keterangan;
        $galeripl->id_produk = $request->id_produk;
        $galeripl->galeri_seo = Str::slug($request->nama_galeri);

        $gambar = $request->foto;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();

        Image::make($gambar)->save('thumb/'.$namafile);
        $gambar->move('public/images/', $namafile);

        $galeripl->foto = $namafile;
        $galeripl->save();

        return redirect('/adminGaleriPL')->with('pesan','Data Produk Berhasil di Tambahkan! Silahkan Cek Produk Anda.');
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
        $galeripl = GaleriPL::find($id);
        $data_kategori = Kategori::all();
        $data_produk = ProdukLain::all();
        return view('AdminGaleriPL.edit', compact('galeripl', 'data_kategori', 'data_produk'));
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
        $this->validate($request,[
            'foto' => 'image|mimes:jpeg,png,jpg|max:5120',
            'nama_galeri' => 'required|string',
            'keterangan' => 'required|string',
            'id_produk' => 'required',
        ]);

        $galeripl = GaleriPL::find($id);
        $galeripl->nama_galeri = $request->nama_galeri;
        $galeripl->keterangan = $request->keterangan;
        $galeripl->id_produk = $request->id_produk;
        $galeripl->galeri_seo = Str::slug($request->nama_galeri);

        $gambar = $request->foto;

        if($gambar) {
            File::delete('thumb/'.$galeripl->foto); //data foto yang lama dihapus dulu
            $namafile = $gambar->getClientOriginalName();
            $data['foto'] = $namafile; // Update field photo
    
            Image::make($gambar)->save('thumb/'.$namafile);
            $gambar->move('public/images/', $namafile);

            $galeripl->foto = $namafile;

            $galeripl->update();
            return redirect('/adminGaleriPL')->with(
                'pesan', 'Perubahan Data Produk Berhasil diSimpan! Silahkan Cek Perubahan Produk Anda.'
            );
        }else{
            $galeripl->update([
                'nama_galeri' => $request->nama_galeri,
                'keterangan' => $request->keterangan,
                'id_produk' => $request->id_produk,
                'galeri_seo' => Str::slug($request->nama_galeri)
            ]);
            return redirect('/adminGaleriPL')->with(
                'pesan', 'Perubahan Data Produk Berhasil diSimpan! Silahkan Cek Perubahan Produk Anda.'
            );
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeripl = GaleriPL::find($id);
        $galeripl->delete();
        File::delete('thumb/'.$galeripl->foto);
        File::delete('public/images/'.$galeripl->foto);
        return redirect('/adminGaleriPL')->with('pesan', 'Data Produk Berhasil di Hapus');
    }
}
