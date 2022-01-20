<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;
use App\Kategori;
use File;
use Image;

class AdminPromoController extends Controller
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
        $data_promo = Promo::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($data_promo->currentPage()-1);

        return view('AdminPromo.indexPromo', compact('data_kategori', 'data_promo' ,'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::all();
        return view('AdminPromo.create', compact('data_kategori'));
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
            'gambar_promo' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'judul_promo' => 'required|string',
            'deskripsi_promo' => 'required|string',
        ]);
        
        $promo = new Promo;
        $promo->judul_promo = $request->judul_promo;
        $promo->deskripsi_promo = $request->deskripsi_promo;

        $foto = $request->gambar_promo;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->save('thumb/'.$namafile);
        $foto->move('public/images/', $namafile);

        $promo->gambar_promo = $namafile;
        $promo->save();

        return redirect('/adminPromo')->with('pesan','Promo Berhasil di Tambahkan!');
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
        $promo = Promo::find($id);
        $data_kategori = Kategori::all();
        return view('AdminPromo.edit', compact('promo', 'data_kategori'));
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
            'gambar_promo' => 'image|mimes:jpeg,png,jpg|max:5120',
            'judul_promo' => 'required|string',
            'deskripsi_promo' => 'required|string',
        ]);

        $promo = Promo::find($id);
        $promo->judul_promo = $request->judul_promo;
        $promo->deskripsi_promo = $request->deskripsi_promo;

        $foto = $request->gambar_promo;

        if($foto) {
            File::delete('thumb/'.$promo->gambar_promo); //data foto yang lama dihapus dulu
            $namafile = $foto->getClientOriginalName();
            $data['gambar_promo'] = $namafile; // Update field photo
    
            Image::make($foto)->save('thumb/'.$namafile);
            $foto->move('public/images/', $namafile);

            $promo->gambar_promo = $namafile;

            $promo->update();
            return redirect('/adminPromo')->with(
                'pesan', 'Perubahan Promo Berhasil diSimpan!'
            );

        }else{
            $promo->update([
                'judul_promo' => $request->judul_promo,
                'deskripsi_promo' => $request->deskripsi_promo
            ]);
            return redirect('/adminPromo')->with(
                'pesan', 'Perubahan Promo Berhasil diSimpan!'
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
        $promo = Promo::find($id);
        $promo->delete();
        File::delete('thumb/'.$promo->gambar_promo);
        File::delete('public/images/'.$promo->gambar_promo);
        return redirect('/adminPromo')->with('pesan', 'Promo Berhasil di Hapus');
    }
}
