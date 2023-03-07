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


        $cat_names = [
        'МАСЛО СЛИВОЧНОЕ ВЕСОВОЕ',
        'МАСЛО СЛИВОЧНОЕ С НАПОЛНИТЕЛЯМИ ВЕСОВОЕ',
        'МАСЛО СЛИВОЧНОЕ С НАПОЛНИТЕЛЯМИ ФАСОВАННОЕ',
        'МАСЛО СЛИВОЧНОЕ ФАСОВАННОЕ',
        'СЫР ПЛАВЛЕННЫЙ ФАСОВАННЫЙ',
        'СЫРЫ ПОЛУТВЕРДЫЕ ВЕСОВЫЕ',
        'СЫРЫ ТВЕРДЫЕ ВЕСОВЫЕ',
        'СЫРЫ ФАСОВАННЫЕ',
        'СЫЧУЖНЫЙ ПРОДУКТ ВЕСОВОЙ',
        'СЫЧУЖНЫЙ ПРОДУКТ ФАСОВАННЫЙ',
        ];

        $category = [];

        foreach ($cat_names as $cat_name) {
            $category[] = [
                    "name" => $cat_name,
                    "title" => $cat_name,
                    "title" => $cat_name,
                    "slug" => Str::slug($cat_name),
                    "img" => "",
                    "quote" => '',
                    "description" => '',
                    "seo_title" => $cat_name,
                    "seo_description" => $cat_name,
            ];
        }

        DB::table("categories")->insert($category);


    }
}
