<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukLaptop extends Model
{
    protected $table = 'produklaptops';
    protected $fillable = [
        'gambar','merk','display','cpu','gpu','ram','storage','os','deskripsi','harga','jml_unit',
    ];
}
