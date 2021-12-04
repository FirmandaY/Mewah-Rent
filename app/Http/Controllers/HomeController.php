<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Kategori;
use App\ProdukLain;
use File;
use Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $batas = 5;
        $data_kategori = Kategori::all();
        $produklain = ProdukLain::all();

        $jumlah_harga = ProdukLain::sum('harga');
        $jumlah_produk = ProdukLain::sum('jml_unit');
        $jenis_produk = ProdukLain::count();
       

        return view('home', compact(
            'jumlah_produk', 'jenis_produk', 'jumlah_harga', 'data_kategori', 'produklain')
        );
    }
}
