<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        php_uname();

        // if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {

        DB::table("options")->insert(
            [
                [
                    "name" => "policy",
                    "type" => "rich",
                    'title' => 'Политика конфиденциальности',
                    "value" => file_get_contents(public_path('texts//policy.txt')),
                ],

                [
                    "name" => "about",
                    "type" => "rich",
                    'title' => 'О компании',
                    "value" => file_get_contents(public_path('texts//about.html')),
                ],

                [
                    "name" => "about_main",
                    "type" => "rich",
                    'title' => 'О компании (На главной)',
                    "value" => file_get_contents(public_path('texts//about-main.html')),
                ],

                [
                    "name" => "adress",
                    "type" => "plan",
                    'title' => 'Адрес',
                    "value" => "Куроская область, г. Рыльск, ул Новая, д. 6",
                ],

                [
                    "name" => "phone",
                    "type" => "plan",
                    'title' => 'Телефон',
                    "value" => "+7 (47152)3-17-56",
                ],

                [
                    "name" => "phone_op",
                    "type" => "plan",
                    'title' => 'Телефон отдела продаж',
                    "value" => "+7 (47152) 3-17-86",
                ],

                [
                    "name" => "organization",
                    "type" => "plan",
                    'title' => 'Оргнанизация',
                    "value" => "Общество с ограниченной ответственностью  «Город Сыра»",
                ],

                [
                    "name" => "email",
                    "type" => "plan",
                    'title' => 'e-mail',
                    "value" => "rylsk-syr@yandex.ru",
                ],

                [
                    "name" => "email1",
                    "type" => "plan",
                    'title' => 'e-mail (1)',
                    "value" => "info@nm-rylsk.ru",
                ],

                [
                    "name" => "email2",
                    "type" => "plan",
                    'title' => 'e-mail (2)',
                    "value" => "info@gorod-syra.ru",
                ],

                [
                    "name" => "email_send",
                    "type" => "plan",
                    'title' => 'e-mail для отправки',
                    "value" => "info@florida46.ru, asmi046@gmail.com",
                ],

                [
                    "name" => "telegram_lnk",
                    "type" => "plan",
                    'title' => 'Ссылка Telegram',
                    "value" => "tg://resolve?domain=floridasfl",
                ],

                [
                    "name" => "whatsapp_lnk",
                    "type" => "plan",
                    'title' => 'Ссылка WhatsApp',
                    "value" => "https://wa.me/792071025551",
                ],

                [
                    "name" => "vk_lnk",
                    "type" => "plan",
                    'title' => 'Ссылка Vk',
                    "value" => "https://vk.com/florida46kursk",
                ],
            ]);
    }
}
