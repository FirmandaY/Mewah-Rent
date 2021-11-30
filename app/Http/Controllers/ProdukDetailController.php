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
    public function produkdetail(){
        $batas = 5;
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
}
