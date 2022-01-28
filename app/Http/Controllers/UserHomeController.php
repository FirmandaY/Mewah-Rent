<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Kategori;
use App\About;
use App\ProdukLain;
use App\Testimonial;
use App\GaleriPL;
use App\FAQ;
use App\Promo;
use App\Lokasi;
use App\Kontak;
use App\Sosial;
use File;
use Image;

class UserHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_kategori = Kategori::all();
        $data_testimoni = Testimonial::all();
        $data_promo = Promo::all();
        $data_lokasi = Lokasi::all();
        $data_kontak = Kontak::all();
        $data_sosial = Sosial::all();
        return view('User.index', compact('data_kategori', 'data_testimoni', 'data_promo', 'data_lokasi', 'data_kontak', 'data_sosial'));
    }

    public function produklain($title)
    {
        $batas = 9;
        $data_kategori = Kategori::all();
        
        $kategori = Kategori::where('nama', $title)->first();
        $produks = $kategori->produklains()->orderBy('id', 'desc')->paginate($batas);
        $jumlah_produk = ProdukLain::sum('jml_unit');
        $jenis_produk = ProdukLain::count();
        $jumlah_harga = ProdukLain::sum('harga');
        $no = $batas * ($produks->currentPage()-1);

        return view('User.KatalogProdukLain.catalogPL', compact(
            'kategori', 'produks', 'jumlah_produk', 'jenis_produk', 'jumlah_harga', 'data_kategori', 'no')
        );
    }

    public function produkdetail($title){
        $batas = 5;
        $data_kategori = Kategori::all();
        $data_produk = ProdukLain::orderBy('id', 'desc');
        
        $produk = ProdukLain::where('produklain_seo', $title)->first();
        $galeris = $produk->photos()->orderBy('id', 'desc')->paginate($batas);
        

        $jumlah_produk = ProdukLain::sum('jml_unit');
        
        $no = $batas * ($galeris->currentPage()-1);

        return view('User.KatalogDetail.produkDetail', compact(
            'galeris' ,'produk', 'jumlah_produk', 'data_produk', 'data_kategori', 'no')
        );
    }

    public function about(){
        $batas = 5;
        $data_about = About::orderBy('id','desc')->paginate($batas);
        $data_kategori = Kategori::all();
        return view('User.about', compact('data_about', 'data_kategori'));
    }

    public function faq(){
        $batas = 8;
        $data_faq = FAQ::orderBy('id','desc')->paginate($batas);
        return view('User.faq',compact('data_faq'));
    }
}
