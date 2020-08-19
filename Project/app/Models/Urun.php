<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    protected $table = 'urun';
    protected $guarded = [];

    public function kategoriler()
    {
        return $this->belongsToMany('App\Models\Kategori','kategori_urun');
    }

    public function detay()
    {
        return $this->hasOne('App\Models\UrunDetay')->withDefault();
    }
}
