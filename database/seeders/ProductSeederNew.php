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

            if (($item['title'] === "СП Голландский 50 % Сырно Сытно")&&($item['param_ves_ed'] === "4 кг.")) {
                continue;
            }

            if (($item['title'] === "Масло Крестьянское 72")&&($item['param_ves_ed'] === "250 гр.")) {
                Storage::disk('public')->put("krestyanskoye_250.jpg", file_get_contents(public_path('base/tovar_foto_dop/krestyanskoye_250.jpg')), 'public');
                $item['img'] = Storage::url("krestyanskoye_250.jpg");
                $item['title'] = $item['title']."%";
            }
            if (($item['title'] === "Масло Крестьянское 72")&&($item['param_ves_ed'] === "500 гр.")) {
                Storage::disk('public')->put("krestyanskoye_500.jpg", file_get_contents(public_path('base/tovar_foto_dop/krestyanskoye_500.jpg')), 'public');
                $item['img'] = Storage::url("krestyanskoye_500.jpg");
                $item['title'] = $item['title']."%";
            }
            if (($item['title'] === "Масло Крестьянское 72")&&($item['param_ves_ed'] === "1000 гр.")) {
                Storage::disk('public')->put("krestyanskoye_1000.jpg", file_get_contents(public_path('base/tovar_foto_dop/krestyanskoye_1000.jpg')), 'public');
                $item['img'] = Storage::url("krestyanskoye_1000.jpg");
                $item['title'] = $item['title']."%";
            }

            if (($item['title'] === "Масло Крестьянское 72")&&($item['param_ves_ed'] === "180 гр.")) {
                Storage::disk('public')->put("krestyanskoye_180.jpg", file_get_contents(public_path('base/tovar_foto_dop/krestyanskoye_180.jpg')), 'public');
                $item['img'] = Storage::url("krestyanskoye_180.jpg");
                $item['title'] = $item['title']."%";
            }


            if (($item['title'] === "Масло Крестьянское шоколадное 62%")&&($item['param_ves_ed'] === "250 гр.")) {
                Storage::disk('public')->put("krestyanskoye_ch_250.jpg", file_get_contents(public_path('base/tovar_foto_dop/krestyanskoye_ch_250.jpg')), 'public');
                $item['img'] = Storage::url("krestyanskoye_ch_250.jpg");
            }

            if (($item['title'] === "Масло Крестьянское шоколадное 62%")&&($item['param_ves_ed'] === "500 гр.")) {
                Storage::disk('public')->put("krestyanskoye_ch_500.jpg", file_get_contents(public_path('base/tovar_foto_dop/krestyanskoye_ch_500.jpg')), 'public');
                $item['img'] = Storage::url("krestyanskoye_ch_500.jpg");
            }

            if (($item['title'] === "Масло топленое 99")&&($item['param_ves_ed'] === "350 гр.")) {
                Storage::disk('public')->put("toplenoe_500.jpg", file_get_contents(public_path('base/tovar_foto_dop/toplenoe_500.jpg')), 'public');
                $item['img'] = Storage::url("toplenoe_500.jpg");
                $item['title'] = $item['title']."%";
            }

            if (($item['title'] === "Масло Сливочное безлактозное 82")&&($item['param_ves_ed'] === "180 гр.")) {
                Storage::disk('public')->put("bezlaktoznoye.jpg", file_get_contents(public_path('base/tovar_foto_dop/bezlaktoznoye.jpg')), 'public');
                $item['img'] = Storage::url("bezlaktoznoye.jpg");
                $item['title'] = $item['title']."%";
            }

            if (($item['title'] === "Масло Традиционное 82")&&($item['param_ves_ed'] === "180 гр.")) {
                Storage::disk('public')->put("traditsionnoe_180.jpg", file_get_contents(public_path('base/tovar_foto_dop/traditsionnoe_180.jpg')), 'public');
                $item['img'] = Storage::url("traditsionnoe_180.jpg");
                $item['title'] = $item['title']."%";
            }

            if (($item['title'] === 'Сыр плавленный "Шоколадный" 30%')&&($item['param_ves_ed'] === "90 гр.")) {
                Storage::disk('public')->put("plavleny_ch.jpg", file_get_contents(public_path('base/tovar_foto_dop/plavleny_ch.jpg')), 'public');
                $item['img'] = Storage::url("plavleny_ch.jpg");
            }

            if (($item['title'] === 'Сыр плавленный "Дружба" 55%')&&($item['param_ves_ed'] === "90 гр.")) {
                Storage::disk('public')->put("plavleny_druzgba.jpg", file_get_contents(public_path('base/tovar_foto_dop/plavleny_druzgba.jpg')), 'public');
                $item['img'] = Storage::url("plavleny_druzgba.jpg");
            }

            if (($item['title'] === 'Сыр плавленный пастообразный "Со вкусом ветчины" 45%')&&($item['param_ves_ed'] === "90 гр.")) {
                Storage::disk('public')->put("plavleny_vetchina.jpg", file_get_contents(public_path('base/tovar_foto_dop/plavleny_vetchina.jpg')), 'public');
                $item['img'] = Storage::url("plavleny_vetchina.jpg");
            }

            if (($item['title'] === 'Сыр плавленный "Янтарь" 55%')&&($item['param_ves_ed'] === "90 гр.")) {
                Storage::disk('public')->put("plavleny_yantar.jpg", file_get_contents(public_path('base/tovar_foto_dop/plavleny_yantar.jpg')), 'public');
                $item['img'] = Storage::url("plavleny_yantar.jpg");
            }

            if (($item['title'] === 'Сыр Российский Молодой 50%')&&($item['param_ves_ed'] === "4 кг.")) {
                Storage::disk('public')->put("pt_rossisriy_molodoy.jpg", file_get_contents(public_path('base/tovar_foto_dop/pt_rossisriy_molodoy.jpg')), 'public');
                $item['img'] = Storage::url("pt_rossisriy_molodoy.jpg");
            }

            if (($item['title'] === 'Сыр Сметанковый брус 50%')&&($item['param_ves_ed'] === "4 кг.")) {
                Storage::disk('public')->put("pt_smetankovi_brus.jpg", file_get_contents(public_path('base/tovar_foto_dop/pt_smetankovi_brus.jpg')), 'public');
                $item['img'] = Storage::url("pt_smetankovi_brus.jpg");
            }

            if (($item['title'] === 'Сыр Тильзитер 45%')&&($item['param_ves_ed'] === "4 кг.")) {
                Storage::disk('public')->put("pt_tilziter_brus.jpg", file_get_contents(public_path('base/tovar_foto_dop/pt_tilziter_brus.jpg')), 'public');
                $item['img'] = Storage::url("pt_tilziter_brus.jpg");
            }

            if (($item['title'] === 'СП Российский классический 50% Сырно Сытно')&&($item['param_ves_ed'] === "4 кг.")) {
                Storage::disk('public')->put("ss_rossiskiy_classic.jpg", file_get_contents(public_path('base/tovar_foto_dop/ss_rossiskiy_classic.jpg')), 'public');
                $item['img'] = Storage::url("ss_rossiskiy_classic.jpg");
            }

            if (($item['title'] === 'СП Сливочный классический 50% Сырно Сытно')&&($item['upacovka'] === "Круг")) {
                Storage::disk('public')->put("ss_slivohni_classic.jpg", file_get_contents(public_path('base/tovar_foto_dop/ss_slivohni_classic.jpg')), 'public');
                $item['img'] = Storage::url("ss_slivohni_classic.jpg");
            }

            if (($item['title'] === 'СП Сметанковый классический 50% Сырно Сытно')&&($item['upacovka'] === "Круг")) {
                Storage::disk('public')->put("ss_smetankovi_classic.jpg", file_get_contents(public_path('base/tovar_foto_dop/ss_smetankovi_classic.jpg')), 'public');
                $item['img'] = Storage::url("ss_smetankovi_classic.jpg");
            }

            DB::table("products")->insert($item);

            var_dump($item);

            $i++;
        }


    }
}

