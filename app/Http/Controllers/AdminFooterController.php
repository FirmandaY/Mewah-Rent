<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Kategori;
use App\Lokasi;
use App\Kontak;
use App\Sosial;

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
        $batasMap = 2;
        $data_lokasi = Lokasi::orderBy('id','desc')->paginate($batasMap);
        $data_kontak = Kontak::orderBy('id', 'desc')->paginate($batas);
        $data_sosial = Sosial::orderBy('id', 'desc')->paginate($batas);
        $data_kategori = Kategori::all();
        $no = $batas * ($data_lokasi->currentPage()-1);
        $no2 = $batas * ($data_lokasi->currentPage()-1);
        

        return view('AdminFooter.indexFooter', compact('data_lokasi','data_kontak', 'data_sosial', 'data_kategori', 'no', 'no2'));
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

    public function createKontak()
    {
        $data_kategori = Kategori::all();
        return view('AdminFooter.createKontak', compact('data_kategori'));
    }

    public function createSosial()
    {
        $data_kategori = Kategori::all();
        return view('AdminFooter.createSosial', compact('data_kategori'));
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

    public function storeKontak(Request $request)
    {
        $this->validate($request,[
            'no_telp' => 'nullable|string',
            'email' => 'nullable|string',
        ]);

        $kontak = new Kontak;
        $kontak->no_telp = $request->no_telp;
        $kontak->email = $request->email;
        $kontak->save();

        return redirect('/adminFooter')->with('pesan', 'Data Kontak berhasil di buat!');
    }

    public function storeSosial(Request $request)
    {
        $this->validate($request,[
            'media' => 'required|string',
            'username' => 'required|string',
            'link' => 'required|string',
        ]);

        $sosial = new Sosial;
        $sosial->media = $request->media;
        $sosial->username = $request->username;
        $sosial->link = $request->link;
        $sosial->save();

        return redirect('/adminFooter')->with('pesan', 'Data Sosial Media berhasil di buat!');
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

    public function editKontak($id)
    {
        $data_kategori = Kategori::all();
        $kontak = Kontak::find($id);
        return view('AdminFooter.editKontak', compact('data_kategori', 'kontak'));
    }

    public function editSosial($id)
    {
        $data_kategori = Kategori::all();
        $sosial = Sosial::find($id);
        return view('AdminFooter.editSosial', compact('data_kategori', 'sosial'));
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
            'map' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $lokasi = Lokasi::find($id);
        $lokasi->map = $request->map;
        $lokasi->alamat = $request->alamat;
        $lokasi->update();

        return redirect('/adminFooter')->with('pesan', 'Perubahan Data Lokasi berhasil di simpan!');
    }

    public function updateKontak(Request $request, $id)
    {
        $this->validate($request,[
            'no_telp' => 'nullable|string|max:350',
            'email' => 'nullable|string',
        ]);

        $kontak = Kontak::find($id);
        $kontak->no_telp = $request->no_telp;
        $kontak->email = $request->email;
        $kontak->update();

        return redirect('/adminFooter')->with('pesan', 'Perubahan Data Kontak berhasil di simpan!');
    }

    public function updateSosial(Request $request, $id)
    {
        $this->validate($request,[
            'media' => 'required|string|max:350',
            'username' => 'required|string|max:350',
            'link' => 'required|string',
        ]);

        $sosial = Sosial::find($id);
        $sosial->media = $request->media;
        $sosial->username = $request->username;
        $sosial->link = $request->link;
        $sosial->update();

        return redirect('/adminFooter')->with('pesan', 'Perubahan Data Sosial Media berhasil di simpan!');
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

    public function destroyKontak($id)
    {
        $kontak = Kontak::find($id);
        $kontak->delete();
        return redirect('/adminFooter')->with('pesanHapus', 'Data Kontak Berhasil di Hapus');
    }

    public function destroySosial($id)
    {
        $sosial = Sosial::find($id);
        $sosial->delete();
        return redirect('/adminFooter')->with('pesanHapus', 'Data Sosial Berhasil di Hapus');
    }
}
