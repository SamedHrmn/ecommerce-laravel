<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Kategori;
use App\Models\Urun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index($slug_kategoriadi){

            $kategoriler = Kategori::all();
            $kategori_urun = Kategori::where('slug',$slug_kategoriadi)->firstOrFail();
            $urunler = $kategori_urun->urunler;
            return view('magaza',compact('kategoriler','urunler','kategori_urun'));
    }

    public function magaza()
    {
        $kategoriler = Kategori::all();
        $urunler = Urun::paginate(6);
        return view('magaza',compact('kategoriler','urunler'));
    }



}
