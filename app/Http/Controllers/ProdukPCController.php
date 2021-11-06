<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdukPC;
class PCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_pc = ProdukPC::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($data_pc->currentPage()-1);
        $jumlah_pc = ProdukPC::count();
        $jumlah_harga = ProdukPC::sum('harga');

        return view('Admin.indexpc', compact('data_pc','no','jumlah_pc','jumlah_harga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.create');
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
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'merk' => 'required|string|max:30',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
            'ram' => 'required|string',
            'storage' => 'required|string',
            'os' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|string',
            'jml_unit' => 'required|string'
        ]);

        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        dd($file);
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        $pc = new ProdukPC;
        $pc->gambar = $request->gambar;
        $pc->merk = $request->merk;
        $pc->cpu = $request->cpu;
        $pc->gpu = $request->gpu;
        $pc->ram = $request->ram;
        $pc->storage = $request->storage;
        $pc->os = $request->os;
        $pc->deskripsi = $request->deskripsi;
        $pc->harga = $request->harga;
        $pc->jml_unit = $request->jml_unit;
        $pc->save();
        return redirect('/adminPC')->with('pesan','Data PC Berhasil di Tambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
