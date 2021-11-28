<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\FAQ;
use File;
use Image;

class AdminFAQController extends Controller
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
        $data_faq = FAQ::orderBy('id','desc')->paginate($batas);
        $faq = FAQ::all();
        return view('AdminFAQ.indexFAQ', compact('data_faq', 'faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminFAQ.create');
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
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string'
        ]);
        
        $faq = new FAQ;
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->save();

        return redirect('/adminFAQ')->with('pesan','Data FAQ Berhasil di Tambahkan');
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
        $faq = FAQ::find($id);
        return view('AdminFAQ.edit', compact('faq'));
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
        $faq = FAQ::find($id);
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        
        $faq->update();
        return redirect('/adminFAQ')->with('pesan', 'Perubahan Data FAQ Berhasil diSimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();
        return redirect('/adminFAQ')->with('pesan', 'Data FAQ Berhasil di Hapus');
    }
}
