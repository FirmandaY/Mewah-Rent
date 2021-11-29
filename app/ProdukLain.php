<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kategori;

class ProdukLain extends Model
{
    protected $table = 'produklain';
    protected $fillable = [
        'gambar', 'merk', 'os', 'display', 'deskripsi', 'harga', 'jml_unit','id_kategori',
    ];

    public function kategoris(){
        return $this->belongsTo('App\Kategori', 'id_kategori', 'id');
        //Berarti galeri ini menjadi milik suatu buku dengan id tertentu
    }
}
