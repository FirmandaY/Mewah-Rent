<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\About;
use App\Kategori;
use File;
use Image;
use Illuminate\Support\Str;
class AdminAboutController extends Controller
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
        $data_about = About::orderBy('id','desc')->paginate($batas);
        $data_kategori = Kategori::all();
        $about = About::all();
        return view('AdminAbout.indexAbout', compact('data_about', 'data_kategori', 'about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::all();
        return view('AdminAbout.create', compact('data_kategori'));
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
            'tentangkami' => 'required|string',
        ]);
        
        $about = new About;
        $about->tentangkami = $request->tentangkami;

        $gambar = $request->foto;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();

        Image::make($gambar)->save('thumb/'.$namafile);
        $gambar->move('public/images/', $namafile);

        $about->foto = $namafile;
        $about->save();

        return redirect('/adminAbout')->with('pesan','Data About Berhasil di Tambahkan');
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
        $about = About::find($id);
        $data_kategori = Kategori::all();
        return view('AdminAbout.edit', compact('about', 'data_kategori'));
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
        $about = About::find($id);
        $about->tentangkami = $request->tentangkami;
        

        $foto = $request->foto;

        if($foto) {
            File::delete('thumb/'.$about->foto); //data foto yang lama dihapus dulu
            $namafile = $foto->getClientOriginalName();
            $data['foto'] = $namafile; // Update field photo
    
            $proses = $foto->move('thumb/', $namafile);

            $about->foto = $namafile;
            $about->update();
            return redirect('/adminAbout')->with('pesan', 'Perubahan Data About Berhasil diSimpan');

        }else{
            $about->update([
                'tentangkami' => $request->tentangkami
            ]);
            return redirect('/adminAbout')->with('pesan', 'Perubahan Data About Berhasil diSimpan');
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
        $about = About::find($id);
        $about->delete();
        return redirect('/adminAbout')->with('pesanHapus', 'Data About Berhasil di Hapus');
    }
}
