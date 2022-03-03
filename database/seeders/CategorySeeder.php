<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = array(
            'Ziraat, İçecek ve Gıda Ürünleri',
            'Tekstil',
            'Deri ve Deri Kimyasalları',
            'Moda',
            'Elektrik ve Elektronik Ürünleri',
            'Hediyelik, Hobi ve Oyuncak',
            'Medikal ve Tek Kullanımlık Ürünler',
            'Yapı Malzemeleri ve Bahçe',
            'Temizlik',
            'Kimyasallar ve Hammaddeler',
            'Ambalaj ve Kırtasiye',
            'Kozmetik ve Kişisel Bakım',
            'Spor Ekipmanları',
            'Anne ve Bebek Ürünleri',
            'Züccaciye',
            'Mobilya',
            'Oto Yedek Parça',
            'Diğer',
        );

        foreach ($names as $name){
            Category::create([
                'name'=> $name,
                'seflink' => Str::slug($name),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }


    }
}
