<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProdukLain;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'nama', 'foto', 'keterangan',
    ];

    public function produklains(){
        return $this->hasMany('App\ProdukLain', 'id_kategori', 'id');
        //Berarti galeri ini menjadi milik suatu buku dengan id tertentu
    }
}
