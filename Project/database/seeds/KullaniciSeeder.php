<?php

use App\Models\Kullanici;
use App\Models\KullaniciDetay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KullaniciSeeder extends Seeder
{
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Kullanici::truncate();
        KullaniciDetay::truncate();

        $kullanici_yonetici = Kullanici::create([
            'adsoyad'=>'Samed Harman',
            'email'=>'samed@gmail.com',
            'sifre'=>bcrypt('225154'),
            'yonetici_mi'=>1
        ]);
        $kullanici_yonetici->detay()->create([
            'adres'=>'Ankara',
            'telefon'=>'3125556677',
            'ceptelefonu'=>'55544422211'
        ]);

        for ($i = 0;$i<50;$i++){
            $kullanici_musteri = Kullanici::create([
                'adsoyad'=>$faker->name,
                'email'=>$faker->unique()->safeEmail,
                'sifre'=>bcrypt('123456'),
                'yonetici_mi'=>0
            ]);

            $kullanici_musteri->detay()->create([
                'adres'=>$faker->address,
                'telefon'=>$faker->e164PhoneNumber,
                'ceptelefonu'=>$faker->e164PhoneNumber
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
