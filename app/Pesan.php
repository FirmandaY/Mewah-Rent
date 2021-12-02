<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = "pesan";
    protected $fillable = [
        'nama', 'no_telpon', 'email', 'pesan_user',
    ];
}
