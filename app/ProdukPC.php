<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukPC extends Model
{
    protected $table = 'produkpcs';
    protected $fillable = ['file','keterangan'];
}
