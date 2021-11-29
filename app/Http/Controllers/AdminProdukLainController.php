<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\ProdukLain;
use App\Kategori;
use File;
use Image;

class AdminProdukLainController extends Controller
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
        $data_produk = ProdukLain::orderBy('id','desc')->paginate($batas);
        $data_kategori = Kategori::all();
        $no = $batas * ($data_produk->currentPage()-1);
        $jumlah_produk = ProdukLain::sum('jml_unit');
        $jenis_produk = ProdukLain::count();
        $jumlah_harga = ProdukLain::sum('harga');

        


        return view('AdminProdukLain.indexProdukLain', compact(
            'data_produk', 'data_kategori','no','jumlah_produk','jenis_produk','jumlah_harga',
        ));
    }

    public function search(Request $request){
        $data_kategori = Kategori::all();
        $batas = 5;
        $cari = $request->kata;
        $data_produk = ProdukLain::where('merk','like',"%".$cari."%")->orwhere('deskripsi', 'like', "%".$cari."%")
        ->paginate($batas);
        $no = $batas * ($data_produk->currentPage()-1);
        $jumlah_produk = ProdukLain::count('jml_unit');
        $jenis_produk = ProdukLain::count();
        $jumlah_harga = ProdukLain::sum('harga');

        return view('AdminProdukLain.search', compact('data_produk','no','jumlah_produk','jenis_produk','cari','jumlah_harga','data_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::all();
        return view('AdminProdukLain.create', compact('data_kategori'));
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
            'display' => 'required|string',
            'os' => 'required|string',
            'deskripsi' => 'required|string|max:250',
            'harga' => 'required|string',
            'jml_unit' => 'required|string'
        ]);
        
        $produk = new ProdukLain;
        
        $produk->merk = $request->merk;
        $produk->display = $request->display;
        $produk->os = $request->os;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->jml_unit = $request->jml_unit;
        $produk->id_kategori = $request->id_kategori;

        $foto = $request->gambar;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->save('thumb/'.$namafile);
        $foto->move('public/images/', $namafile);

        $produk->gambar = $namafile;
        $produk->save();

        return redirect()->back()->with('pesan','Data Produk Berhasil di Tambahkan! Silahkan Cek Produk Anda.');
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
        $produk = ProdukLain::find($id);
        $data_kategori = Kategori::all();
        return view('AdminProdukLain.edit', compact('produk', 'data_kategori'));
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
        $produk = ProdukPC::find($id);
        $produk->merk = $request->merk;
        $produk->display = $request->display;
        $produk->os = $request->os;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->jml_unit = $request->jml_unit;
        $produk->id_kategori = $request->id_kategori;

        $foto = $request->gambar;

        if($foto) {
            File::delete('thumb/'.$produk->gambar); //data foto yang lama dihapus dulu
            $namafile = $foto->getClientOriginalName();
            $data['gambar'] = $namafile; // Update field photo
    
            Image::make($foto)->save('thumb/'.$namafile);
            $foto->move('public/images/', $namafile);
        }
        
        $produk->gambar = $namafile;

        $produk->update();
        return redirect('/adminProdukLain')->with(
            'pesan', 'Perubahan Data Produk Berhasil diSimpan! Silahkan Cek Perubahan Produk Anda.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = ProdukLain::find($id);
        $produk->delete();
        File::delete('thumb/'.$produk->gambar);
        File::delete('public/images/'.$produk->gambar);
        return redirect('/adminProdukLain')->with('pesan', 'Data Produk Berhasil di Hapus');
    }
}
