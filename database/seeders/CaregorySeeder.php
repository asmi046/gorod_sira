<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CaregorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $cat_info = [
            [
                "name" => 'МАСЛО СЛИВОЧНОЕ ВЕСОВОЕ',
                "img" => "maslo_slivohnoe_vesovoe.jpg"
            ],

            [
                "name" => 'МАСЛО СЛИВОЧНОЕ С НАПОЛНИТЕЛЯМИ ВЕСОВОЕ',
                "img" => "maslo_slivohnoe_vesovoe_s_napolniteliami.jpg"
            ],

            [
                "name" => 'МАСЛО СЛИВОЧНОЕ С НАПОЛНИТЕЛЯМИ ФАСОВАННОЕ',
                "img" => "maslo_slivohnoe_fasovonoe_s_napolniteliami.jpg"
            ],

            [
                "name" => 'МАСЛО СЛИВОЧНОЕ ФАСОВАННОЕ',
                "img" => "maslo_slivohnoe_fasovonoe.jpg"
            ],

            [
                "name" => 'СЫР ПЛАВЛЕННЫЙ ФАСОВАННЫЙ',
                "img" => "siri_plavlenie_fasovanie.jpg"
            ],

            [
                "name" => 'СЫРЫ ПОЛУТВЕРДЫЕ ВЕСОВЫЕ',
                "img" => "siri_polutverdie_vesovie.jpg"
            ],

            [
                "name" => 'СЫРЫ ТВЕРДЫЕ ВЕСОВЫЕ',
                "img" => "siri_tverdie_vesovie.jpg"
            ],

            [
                "name" => 'СЫРЫ ФАСОВАННЫЕ',
                "img" => "siri_fasovanie.jpg"
            ],

            [
                "name" => 'СЫЧУЖНЫЙ ПРОДУКТ ВЕСОВОЙ',
                "img" => "sihugni_product_vesovoi.jpg"
            ],

            [
                "name" => 'СЫЧУЖНЫЙ ПРОДУКТ ФАСОВАННЫЙ',
                "img" => "sihugni_product_fasovani.jpg"
            ]
        ];

        $category = [];

        foreach ($cat_info as $cat) {

            Storage::disk('public')->put($cat["img"], file_get_contents(public_path('base/category_foto/'.$cat["img"])), 'public');

            $category[] = [
                    "name" => $cat["name"],
                    "title" => $cat["name"],
                    "title" => $cat["name"],
                    "slug" => Str::slug($cat["name"]),
                    "img" => (!empty($cat["img"]))?Storage::url($cat["img"]):"",
                    "quote" => '',
                    "description" => '',
                    "seo_title" => $cat["name"],
                    "seo_description" => $cat["name"],
            ];
        }

        DB::table("categories")->insert($category);


    }
}
