<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Testimonial;
use App\Kategori;
use File;
use Image;

class AdminTestimoniController extends Controller
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
        $data_testimoni = Testimonial::orderBy('id','desc')->paginate($batas);
        $data_kategori = Kategori::all();
        $no = $batas * ($data_testimoni->currentPage()-1);
        $jml_testimoni = Testimonial::count('testimoni');
        return view('AdminTestimoni.indexTestimoni', compact('data_testimoni', 'data_kategori','no', 'jml_testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::all();
        return view('AdminTestimoni.create', compact('data_kategori'));
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
            'sumber' => 'required|string',
            'testimoni' => 'required|string|max:125'
        ]);
        
        $testimoni = new Testimonial;
        $testimoni->sumber = $request->sumber;
        $testimoni->testimoni = $request->testimoni;
        $testimoni->save();

        return redirect('/adminTestimoni')->with('pesan','Data Testimoni Berhasil di Tambahkan');
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
        $testimoni = Testimonial::find($id);
        $data_kategori = Kategori::all();
        return view('AdminTestimoni.edit', compact('testimoni', 'data_kategori'));
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
            'sumber' => 'required|string',
            'testimoni' => 'required|string|max:125'
        ]);
        
        $testimoni = Testimonial::find($id);
        $testimoni->sumber = $request->sumber;
        $testimoni->testimoni = $request->testimoni;
        
        $testimoni->update();
        return redirect('/adminTestimoni')->with('pesan', 'Perubahan Data Testimoni Berhasil diSimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni = Testimonial::find($id);
        $testimoni->delete();
        return redirect('/adminTestimoni')->with('pesanHapus', 'Data Testimoni Berhasil di Hapus');
    }
}
