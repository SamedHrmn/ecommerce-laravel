<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Kullanici extends Authenticatable
{

    protected $table = 'kullanici';
    protected $fillable = [
        'adsoyad','email','sifre','yonetici_mi'
    ];

    protected $hidden = [
      'sifre'
    ];


    public function getAuthPassword()
    {
        return $this->sifre;
    }

    public function detay()
    {
        return $this->hasOne('App\Models\KullaniciDetay')->withDefault();
    }
}
