<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Kategori;
use App\ProdukLain;
use File;
use Image;

class AdminKategoriController extends Controller
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

        return view('AdminKategori.indexKategori', compact('data_kategori'));
    }

    public function prodkategori($title){
        $batas = 5;
        $data_kategori = Kategori::all();
        $produklain = ProdukLain::all();
        

        $kategori = Kategori::where('nama', $title)->first();
        $produks = $kategori->produklains()->orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($produks->currentPage()-1);

        $jumlah_harga = $kategori->produklains()->sum('harga');
        $jumlah_produk = $kategori->produklains()->sum('jml_unit');
        $jenis_produk = $kategori->produklains()->count();

        $jumlah_harga_total = ProdukLain::sum('harga');
        $jumlah_produk_total = ProdukLain::sum('jml_unit');
        $jenis_produk_total = ProdukLain::count();
       

        return view('AdminKategori.indexProdukKat', compact(
            'kategori', 'produks', 'jumlah_produk', 'jenis_produk', 'jumlah_harga', 'data_kategori', 'no', 'produklain')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::all();
        
        return view('AdminKategori.create', compact('data_kategori'));
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
            'nama' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'keterangan' => 'required|string|max:150',
        ]);
        
        $kategori = new Kategori;
        $kategori->nama = $request->nama;
        $kategori->keterangan = $request->keterangan;
        
        $gambar = $request->foto;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();

        Image::make($gambar)->save('thumb/'.$namafile);
        $gambar->move('public/images/', $namafile);

        $kategori->foto = $namafile;
        $kategori->save();

        return redirect('/adminKategori')->with('pesan','Data Kategori Berhasil di Tambahkan');
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
        $kategori = Kategori::find($id);
        $data_kategori = Kategori::all();
        return view('AdminKategori.edit', compact('kategori', 'data_kategori'));
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
            'nama' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg|max:5120',
            'keterangan' => 'required|string|max:150',
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->keterangan = $request->keterangan;

        $gambar = $request->foto;

        if($gambar) {
            File::delete('thumb/'.$kategori->gambar); //data gambar yang lama dihapus dulu
            $namafile = $gambar->getClientOriginalName();
            $data['foto'] = $namafile; // Update field photo
    
            Image::make($gambar)->save('thumb/'.$namafile);
            $gambar->move('public/images/', $namafile);

            $kategori->foto = $namafile;

            $kategori->update();
            return redirect('/adminKategori')->with('pesan', 'Perubahan Data Kategori Berhasil diSimpan');

        }else{
            $kategori->update([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan
            ]);
            return redirect('/adminKategori')->with('pesan', 'Perubahan Data Kategori Berhasil diSimpan');
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
        $kategori = Kategori::find($id);
        $kategori->delete();
        File::delete('thumb/'.$kategori->foto);
        File::delete('public/images/'.$kategori->foto);
        return redirect('/adminPC')->with('pesan', 'Data Kategori Berhasil di Hapus');
    }
}
