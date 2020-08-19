<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        if(request()->filled('aranan'))
        {
            request()->flash();
            $aranan = request('aranan');

            $list = Kategori::where('kategori_adi','like',"%$aranan%")
                ->orderByDesc('id')
                ->paginate(2);
        }else{
            request()->flush();
            $list = Kategori::orderBy('id','desc')->paginate(8);
        }

        return view('yonetim.kategori.index',compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new Kategori;
        if($id > 0)
        {
            $entry = Kategori::find($id);
        }

        $kategoriler = Kategori::all();

        return view('yonetim.kategori.form',compact('entry','kategoriler'));

    }

    public function kaydet($id = 0)
    {

        $data = request()->only('kategori_adi','slug');
        if(!request()->filled('slug'))
        {
            $data['slug'] = str_slug(request('kategori_adi'));
            request()->merge(['slug'=>$data['slug']]);
        }

        $this->validate(request(),[
            'kategori_adi' => 'required',
            'slug' => (request('original_slug')!=request('slug') ? 'unique:kategori,slug':'')
        ]);

        if($id > 0)
        {
            $entry = Kategori::where('id',$id)->firstOrFail();
            $entry->update($data);
        }else{
            $entry = Kategori::create($data);
        }


        return redirect()
            ->route('yonetim.kategori.duzenle',$entry->id)
            ->with('mesaj',($id>0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        $kategori = Kategori::find($id);
        $kategori->urunler()->detach();

        Kategori::destroy($id);
        return redirect()
            ->route('yonetim.kullanici')
            ->with('mesaj','Kayıt silindi.')
            ->with('mesaj_tur','success');
    }
}
