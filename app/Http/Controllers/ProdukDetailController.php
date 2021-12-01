<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\ProdukLain;
use App\GaleriPL;
use File;
use Image;

class ProdukDetailController extends Controller
{
    //
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
}
