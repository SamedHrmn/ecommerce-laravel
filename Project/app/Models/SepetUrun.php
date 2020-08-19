<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SepetUrun extends Model
{
    protected $table = 'sepet_urun';
    protected $guarded = [];

    public function urun()
    {
        return $this->belongsTo('App\Models\Urun');
    }
}
