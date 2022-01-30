<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Kategori;
use App\Lokasi;
use App\Kontak;
use App\Sosial;
use App\Partner;
use File;
use Image;

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
        $data_partner = Partner::orderBy('id', 'desc')->paginate($batas);
        $data_kategori = Kategori::all();
        $no = $batas * ($data_kontak->currentPage()-1);
        $no2 = $batas * ($data_sosial->currentPage()-1);
        $no3 = $batas * ($data_partner->currentPage()-1);
        

        return view('AdminFooter.indexFooter', compact(
            'data_lokasi','data_kontak', 'data_sosial', 'data_kategori', 'data_partner', 'no', 'no2', 'no3',
        ));
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

    public function createPartner()
    {
        $data_kategori = Kategori::all();
        return view('AdminFooter.createPartner', compact('data_kategori'));
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
            'map' => 'nullable|string',
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
            'tipe' => 'nullable|string',
        ]);

        $kontak = new Kontak;
        $kontak->no_telp = $request->no_telp;
        $kontak->email = $request->email;
        $kontak->tipe = $request->tipe;
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

    public function storePartner(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'instansi' => 'required|string',
            'display' => 'required|string',
            'link' => 'required|string',
        ]);
        
        $partner = new Partner;
        $partner->instansi = $request->instansi;
        $partner->display = $request->display;
        $partner->link = $request->link;

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->save('thumb/'.$namafile);
        $foto->move('public/images/', $namafile);

        $partner->foto = $namafile;
        $partner->save();

        return redirect('/adminFooter')->with('pesan','Data Partner Berhasil di Tambahkan!');
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

    public function editPartner($id)
    {
        $data_kategori = Kategori::all();
        $partner = Partner::find($id);
        return view('AdminFooter.editPartner', compact('data_kategori', 'partner'));
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
            'map' => 'nullable|string',
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
            'tipe' => 'nullable|string',
        ]);

        $kontak = Kontak::find($id);
        $kontak->no_telp = $request->no_telp;
        $kontak->email = $request->email;
        $kontak->tipe = $request->tipe;
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

    public function updatePartner(Request $request, $id)
    {
        $this->validate($request,[
            'foto' => 'image|mimes:jpeg,png,jpg|max:5120',
            'instansi' => 'required|string',
            'display' => 'required|string',
            'link' => 'required|string',
        ]);
        
        $partner = Partner::find($id);
        $partner->instansi = $request->instansi;
        $partner->display = $request->display;
        $partner->link = $request->link;

        $foto = $request->foto;

        if($foto){
            File::delete('thumb/'.$partner->foto); //data foto yang lama dihapus dulu
            $namafile = $foto->getClientOriginalName();
            $data['foto'] = $namafile; // Update field photo
    
            Image::make($foto)->save('thumb/'.$namafile);
            $foto->move('public/images/', $namafile);

            $partner->foto = $namafile;

            $partner->update();
            return redirect('/adminFooter')->with(
                'pesan', 'Perubahan Data Partner Berhasil diSimpan!'
            );

        }else{
            $partner->update([
                'instansi' => $request->instansi,
                'link' => $request->link
            ]);
            return redirect('/adminFooter')->with(
                'pesan', 'Perubahan Data Partner Berhasil diSimpan!'
            );
        }

        
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

    public function destroyPartner($id)
    {
        $partner = Partner::find($id);
        $partner->delete();
        return redirect('/adminFooter')->with('pesanHapus', 'Data Partner Berhasil di Hapus');
    }
}
