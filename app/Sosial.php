<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sosial extends Model
{
    protected $table = 'sosial';
    protected $fillable = [
        'media', 'username', 'link',
    ];
}
