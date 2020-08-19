<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Urun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UrunController extends Controller
{
    public function index($slug_urunadi){

        $urun = Urun::where('slug',$slug_urunadi)->firstOrFail();
        $kategoriler = $urun->kategoriler;
        return view('urun',compact('urun','kategoriler'));
    }

    public function ara()
    {
        $aranan = request()->input('aranan');
        $urunler = Urun::where('urun_adi','like',"%$aranan%")
            ->orWhere('aciklama','like',"%$aranan%")
            ->paginate(2);

        request()->flash();
        return view('arama',compact('urunler'));
    }
}
