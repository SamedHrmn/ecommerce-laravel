<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = [];

    public function urunler()
    {
        return $this->belongsToMany('App\Models\Urun','kategori_urun');
    }
}
