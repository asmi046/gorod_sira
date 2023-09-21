<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductSeederNew extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ourData = file_get_contents(base_path() . "/public/base/gorod_sira_base.json");
        // Преобразуем в объект
        $main_data = json_decode($ourData, true);


        $i = 1;
        foreach ($main_data as $item) {

            if (!empty($item["img"]))
                Storage::disk('public')->put($item["img"], file_get_contents(public_path('base/tovar_foto_new/'.$item["img"])), 'public');

            if (!isset($item["sku"])) continue;

            $item["sku"] = "tov_".$i;

            $item["img"] = (!empty($item["img"]))?Storage::url($item["img"]):"";
            $item["slug"] = Str::slug($item["title"].'-'.$item["sku"]);
            $item['seo_title'] = "Заказать: ". $item["title"];
            $item['seo_description'] = $item["title"] . " - заказать от производителя. Торговая марка: ".$item["tm"].". Натуральный состав. Гарантия высокого качества.";

            $item['price_D_ht'] = 0;
            $item['price_D_kg'] = 0;

            $item['price_OPT_ht'] = 0;
            $item['price_OPT_kg'] = 0;

            $item['price_R_ht'] = 0;
            $item['price_R_kg'] = 0;

            DB::table("products")->insert($item);

            var_dump($item);

            $i++;
        }


    }
}

