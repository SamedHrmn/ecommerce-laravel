<?php

namespace App\Http\Controllers\FrontEnd;


use App\Models\Kullanici;
use App\Models\KullaniciDetay;
use App\Models\Sepet;
use App\Models\SepetUrun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Cart;


class KullaniciController extends Controller
{
    public function giris_form(){
        return view('kullanici.oturumac');
    }

    public function kaydol_form(){
        return view('kullanici.kaydol');
    }

    public function kaydol()
    {
        $this->validate(request(),[
            'adsoyad' => 'required|min:5|max:60',
            'email'  => 'required|email|unique:kullanici',
            'sifre'  => 'required|confirmed|min:5|max:15'
        ]);

        $kullanici = Kullanici::create([
            'adsoyad'=> request('adsoyad'),
            'email'=> request('email'),
            'sifre'=>Hash::make(request('sifre')),
            'yonetici_mi'=>0
        ]);

        $kullanici->detay()->save(new KullaniciDetay());


        auth()->login($kullanici);
        return redirect()->route('anasayfa')->with('mesaj','Kullanıcı kaydınız oluşturuldu')
            ->with('mesaj_tur','success');
    }



    public function giris()
    {
        $this->validate(request(),[
            'email' => 'required|email',
            'sifre' => 'required'
        ]);

        if(auth()->attempt(['email'=>request('email'), 'password'=>request('sifre')]
            ))
        {
            $aktif_sepet_id = Sepet::aktif_sepet_id();
            if(is_null($aktif_sepet_id)){
                $aktif_sepet = Sepet::create(['kullanici_id'=>auth()->id()]);
                $aktif_sepet_id = $aktif_sepet->id;
            }
            session()->put('aktif_sepet_id',$aktif_sepet_id);


            if(Cart::count() > 0)
            {
                foreach(Cart::content() as $cartItem){
                    SepetUrun::updateOrCreate(
                        ['sepet_id'=>$aktif_sepet_id, 'urun_id' => $cartItem->id],
                        ['adet' => $cartItem->qty , 'tutar' => $cartItem->price , 'durum'=>'Beklemede']
                    );
                }
            }

            Cart::destroy();
            $sepetUrunler = SepetUrun::where('sepet_id',$aktif_sepet_id)->get();
            foreach ($sepetUrunler as $sepetUrun){
                Cart::add($sepetUrun->urun->id,$sepetUrun->urun->urun_adi,$sepetUrun->adet,$sepetUrun->tutar ,
                    ['slug'=>$sepetUrun->urun->slug]);
            }


            request()->session()->regenerate();
            return redirect()->intended('/');
        }else{
            $errors = ['email'=>'Hatalı Giriş'];
            return back()->withErrors($errors);
        }
    }

    public function oturumukapat()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('anasayfa');
    }
}
