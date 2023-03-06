<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

use Illuminate\Support\Str;


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

                    // Storage::disk('public')->put($data[0].".svg", file_get_contents(public_path('planes/'.$data[0].'.svg')), 'public');

                    $main_data[] =
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

                            'category' => trim(iconv("windows-1251", "utf-8", $data[0])),
                            'img' => trim(""),
                            'description' => trim(iconv("windows-1251", "utf-8", $data[0]))." - ".trim(iconv("windows-1251", "utf-8", $data[2])),

                            'price_D_ht' => floatval(trim($data[11])),
                            'price_D_kg' => floatval(trim($data[12])),

                            'price_OPT_ht' => floatval(trim($data[13])),
                            'price_OPT_kg' => floatval(trim($data[14])),

                            'price_R_ht' => floatval(trim($data[15])),
                            'price_R_kg' => floatval(trim($data[16])),

                            'seo_title' => trim(iconv("windows-1251", "utf-8", $data[2])),
                            'seo_description' => trim(iconv("windows-1251", "utf-8", $data[0]))." - ".trim(iconv("windows-1251", "utf-8", $data[2])),

                            // 'type' => $type,
                            // 'number' => floatval($data[0]),
                            // 'price' => floatval($data[6]),
                            // 'price_metr' => floatval($data[7]),
                            // 'view' => iconv("windows-1251", "utf-8", $data[8]),
                            // 'podezd' => iconv("windows-1251", "utf-8", $data[9]),
                            // 'area' => floatval($data[2]),
                            // 'area_live' => floatval($data[3]),
                            // 'flor' => intval($data[5]),
                            // 'rooms' => intval($rooms),
                            // 'plan_img' => Storage::url($data[0].".svg"),
                            // 'home_1_img' => Storage::url("home_v_1.jpg"),
                            // 'home_2_img' => Storage::url("home_v_2.jpg"),
                            // 'koridor_img' => "",
                            // 'home_id' => 1,
                        ];

                        $row++;
                }

                // var_dump($main_data);
                DB::table("products")->insert($main_data);
            }
    }
}

