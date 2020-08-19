<?php

namespace App\Providers;

use App\Models\Kategori;
use App\Models\Kullanici;
use App\Models\Siparis;
use App\Models\Urun;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['yonetim.*'],function ($view){
            $bitisZamani = now()->addMinutes(10);
            $istatistikler = Cache::remember('istatistikler',$bitisZamani,function (){
                return
                    [
                        'bekleyen_siparis'=>Siparis::where('durum','Siparişiniz alındı')->count(),
                        'tamamlanan_siparis'=>Siparis::where('durum','Sipariş tamamlandı')->count(),
                        'toplam_urun' => Urun::count(),
                        'toplam_kullanici'=>Kullanici::count(),
                        'toplam_kategori' => Kategori::count()
                    ];
            });
            $view->with('istatistikler',$istatistikler);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
