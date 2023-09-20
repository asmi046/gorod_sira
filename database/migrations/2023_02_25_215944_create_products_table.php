<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sku')->unique()->comment('Артикул');
            $table->string('title')->comment('Название товара');
            $table->string('slug')->unique();
            $table->string('tm')->comment('Торговая марка');
            $table->string('upacovka')->comment('Вид упаковки');
            $table->string('quote')->nullable();

            $table->string('param_zgirnost')->nullable()->comment('Жирность (параметр)');
            $table->string('param_scode')->nullable()->comment('Штрихкод (параметр)');
            $table->string('param_ves_ed')->nullable()->comment('Вес единицы продукции (параметр)');
            $table->string('param_ves_yashik')->nullable()->comment('Вес ящика продукции (параметр)');
            $table->string('param_count_in_pack')->nullable()->comment('Количество в упаковке (параметр)');
            $table->string('param_srok_realiz')->nullable()->comment('Срок реализации (параметр)');

            $table->string('category')->comment('Категория');
            $table->string('category_sub')->comment('Категория 2');
            $table->string('img')->nullable()->comment('Изображение');
            $table->text('description')->comment('Описание');

            $table->float("price_D_ht")->nullable()->comment('Цена дистрибютер за штуку');
            $table->float("price_D_kg")->nullable()->comment('Цена дистрибютер за кг');

            $table->float("price_OPT_ht")->nullable()->comment('Цена опт за штуку');
            $table->float("price_OPT_kg")->nullable()->comment('Цена опт за кг');

            $table->float("price_R_ht")->nullable()->comment('Цена розница за штуку');
            $table->float("price_R_kg")->nullable()->comment('Цена розница за кг');

            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
