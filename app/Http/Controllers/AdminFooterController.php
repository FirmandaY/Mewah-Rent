<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Kategori;
use App\Lokasi;


class AdminFooterController extends Controller
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
        $data_lokasi = Lokasi::orderBy('id','desc')->paginate($batas);
        $data_kategori = Kategori::all();
        $no = $batas * ($data_lokasi->currentPage()-1);

        return view('AdminFooter.indexFooter', compact('data_lokasi', 'data_kategori', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLokasi()
    {
        $data_kategori = Kategori::all();
        return view('AdminFooter.createLokasi', compact('data_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLokasi(Request $request)
    {
        $this->validate($request,[
            'map' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $lokasi = new Lokasi;
        $lokasi->map = $request->map;
        $lokasi->alamat = $request->alamat;
        $lokasi->save();

        return redirect('/adminFooter')->with('pesan', 'Data Lokasi berhasil di buat!');
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
    public function editLokasi($id)
    {
        $data_kategori = Kategori::all();
        $lokasi = Lokasi::find($id);
        return view('AdminFooter.editLokasi', compact('data_kategori', 'lokasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateLokasi(Request $request, $id)
    {
        $this->validate($request,[
            'map' => 'required|string|max:350',
            'alamat' => 'required|string',
        ]);

        $lokasi = Lokasi::find($id);
        $lokasi->map = $request->map;
        $lokasi->alamat = $request->alamat;
        $lokasi->update();

        return redirect('/adminFooter')->with('pesan', 'Perubahan Data Lokasi berhasil di simpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyLokasi($id)
    {
        $lokasi = Lokasi::find($id);
        $lokasi->delete();
        return redirect('/adminFooter')->with('pesanHapus', 'Data Lokasi Berhasil di Hapus');
    }
}
