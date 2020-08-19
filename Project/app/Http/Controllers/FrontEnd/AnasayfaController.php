<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\UrunDetay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnasayfaController extends Controller
{
    public function index()
    {
        $urun_cok_satan = UrunDetay::where('goster_cok_satan',1)->firstOrFail();
        $urun_gunun_firsati = UrunDetay::where('goster_gunun_firsati',1)->firstOrFail();
        $urun_one_cikan = UrunDetay::where('goster_one_cikan',1)->firstOrFail();
        return view('anasayfa',compact('urun_cok_satan','urun_gunun_firsati','urun_one_cikan'));
    }
}
