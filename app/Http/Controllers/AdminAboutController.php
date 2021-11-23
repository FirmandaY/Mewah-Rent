<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\About;
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
        return view('AdminAbout.indexAbout', compact('data_about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
        $about = new ProdukPC;
        $about->tentangkami = $request->tentangkami;

        $gambar = $request->foto;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();

        Image::make($gambar)->save('thumb/'.$namafile);
        $gambar->move('public/images/', $namafile);

        $about->gambar = $namafile;
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
