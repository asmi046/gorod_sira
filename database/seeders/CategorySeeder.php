<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use DB;


class CategorySeeder extends Seeder
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
                "name"=>'Полутвердые сыры',
                "img" => "sirzolotoarturatoplenoemoloko50_4kg.jpg"
            ],

            [
                "name"=>'Твердые сыры',
                "img" => "sirparmezan_fasovka.jpg"
            ],

            [
                "name"=>'СП Сырно сытно',
                "img" => "sirSPmechtasovkusomtoplenogo.jpg"
            ],

            [
                "name" => 'Масло',
                "img" => ""
            ],

            [
                "name" => 'Плавленный сыр',
                "img" => ""
            ],
        ];

        $category = [];

        foreach ($cat_info as $cat) {

            if (!empty($cat["img"]))
                Storage::disk('public')->put($cat["img"], file_get_contents(public_path('base/category_foto_new/'.$cat["img"])), 'public');

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
