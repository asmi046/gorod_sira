<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = base_path() . '/public/base/gorod_sira_base.csv';

        if (($handle = fopen($files, "r")) !== FALSE) {
                echo  $files."\n\r";
                $row = 0;
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    if ($row == 0) {$row++; continue;}
                    if (empty($data[0])) break;

                    if (!empty($data[17]))
                        Storage::disk('public')->put($data[17], file_get_contents(public_path('base/tovar_foto/'.$data[17])), 'public');



                    $cat_name = trim(iconv("windows-1251", "utf-8", $data[0]));

                    $main_data =
                        [

                            'sku' => trim(iconv("windows-1251", "utf-8", $data[1]))."-".$row,
                            'title' => iconv("windows-1251", "utf-8", trim($data[2])),
                            'slug' => Str::slug(trim(iconv("windows-1251", "utf-8", $data[2]))."-".$row),
                            'tm' => "Рыльский сыродел",
                            'upacovka' => trim(iconv("windows-1251", "utf-8", $data[4])),
                            'quote' => trim(iconv("windows-1251", "utf-8", $data[0]))." - ".trim(iconv("windows-1251", "utf-8", $data[2])),

                            'param_zgirnost' => trim(iconv("windows-1251", "utf-8", $data[5])),
                            'param_scode' => trim(iconv("windows-1251", "utf-8", $data[6])),
                            'param_ves_ed' => trim(iconv("windows-1251", "utf-8", $data[7])),
                            'param_ves_yashik' => trim(iconv("windows-1251", "utf-8", $data[8])),
                            'param_count_in_pack' => trim(iconv("windows-1251", "utf-8", $data[9])),
                            'param_srok_realiz' => trim(iconv("windows-1251", "utf-8", $data[10])),

                            'category' => $cat_name,
                            'img' => (!empty($data[17]))?Storage::url($data[17]):"",
                            'description' => trim(iconv("windows-1251", "utf-8", $data[0]))." - ".trim(iconv("windows-1251", "utf-8", $data[2])),

                            'price_D_ht' => floatval(trim($data[11])),
                            'price_D_kg' => floatval(trim($data[12])),

                            'price_OPT_ht' => floatval(trim($data[13])),
                            'price_OPT_kg' => floatval(trim($data[14])),

                            'price_R_ht' => floatval(trim($data[15])),
                            'price_R_kg' => floatval(trim($data[16])),

                            'seo_title' => trim(iconv("windows-1251", "utf-8", $data[2])),
                            'seo_description' => trim(iconv("windows-1251", "utf-8", $data[0]))." - ".trim(iconv("windows-1251", "utf-8", $data[2])),
                        ];

                        if (($main_data['title'] === "Масло Крестьянское 72")&&($main_data['param_ves_ed'] === "250 гр.")) {
                            Storage::disk('public')->put("krestyanskoye_250.jpg", file_get_contents(public_path('base/tovar_foto_dop/krestyanskoye_250.jpg')), 'public');

                            $main_data['img'] = Storage::url("krestyanskoye_250.jpg");
                        }
                        if (($main_data['title'] === "Масло Крестьянское 72")&&($main_data['param_ves_ed'] === "500 гр.")) {
                            Storage::disk('public')->put("krestyanskoye_500.jpg", file_get_contents(public_path('base/tovar_foto_dop/krestyanskoye_500.jpg')), 'public');
                            $main_data['img'] = Storage::url("krestyanskoye_500.jpg");
                        }
                        if (($main_data['title'] === "Масло Крестьянское 72")&&($main_data['param_ves_ed'] === "1000 гр.")) {
                            Storage::disk('public')->put("krestyanskoye_1000.jpg", file_get_contents(public_path('base/tovar_foto_dop/krestyanskoye_1000.jpg')), 'public');
                            $main_data['img'] = Storage::url("krestyanskoye_1000.jpg");
                        }


                        DB::table("products")->insert($main_data);

                        $row++;
                }

            }
    }
}

