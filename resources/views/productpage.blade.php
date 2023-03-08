@extends('layouts.all', ['no_footer_line' => true])

@php
    $title = "Страница товара";
    $description = "Страница товара";
@endphp

@section('title', $title)
@section('description', $description)

@section('content')

    <section class="product_page_content big_pd">
        <div class="_container">
            <div class="breadcrumbs">
                <a href="#">Главная</a> / <a href="#">Продукция</a> / <span>Главная</span>
            </div>



            <div class="prodct_page_blk">
                <div class="pp_blk left">
                    <div class="pp_img_wrapper">
                        <img src="{{empty($productinfo->img)?asset('img/no-photo.jpg'):$productinfo->img }}" alt="">
                    </div>
                </div>

                <div class="pp_blk right">
                    <h1 class="h1_pahe">{{$productinfo->title}}</h1>
                    <ul class="property">
                        <li>— {{$productinfo->upacovka}} {{$productinfo->param_ves_ed}} г</li>
                    </ul>

                    <p class="description">
                        {{$productinfo->description}}
                    </p>

                    <div class="ppInfo">
                        <acordion-element :sopen="true">
                            <template v-slot:acheader>
                                <p>Параметры</p>
                            </template>

                            <template v-slot:accontent>
                                <ul class="tovar_caracter">
                                    <li>
                                        <span class="pname">Категория</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->category}}</span>
                                    </li>

                                    <li>
                                        <span class="pname">Торговая марка</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->tm}}</span>
                                    </li>

                                    <li>
                                        <span class="pname">Жирность</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->param_zgirnost}}</span>
                                    </li>

                                    <li>
                                        <span class="pname">Срок годности</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->param_srok_realiz}} дней.</span>
                                    </li>

                                    <li>
                                        <span class="pname">Штрихкод</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->param_scode}}</span>
                                    </li>
                                </ul>
                            </template>
                        </acordion-element>

                        <acordion-element>
                            <template v-slot:acheader>
                                <p>Упаковка и вес</p>
                            </template>

                            <template v-slot:accontent>
                                <ul class="tovar_caracter">
                                    <li>
                                        <span class="pname">Вид упаковки</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->upacovka}}</span>
                                    </li>

                                    <li>
                                        <span class="pname">Вес единицы продукции</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->param_ves_ed}} г.</span>
                                    </li>

                                    <li>
                                        <span class="pname">Вес ящика продукции</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->param_ves_yashik}} г.</span>
                                    </li>

                                    <li>
                                        <span class="pname">Количество в упаковке</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->param_count_in_pack}} шт.</span>
                                    </li>
                                </ul>
                            </template>
                        </acordion-element>

                        <acordion-element>
                            <template v-slot:acheader>
                                <p>Цены</p>
                            </template>

                            <template v-slot:accontent>
                                <ul class="tovar_caracter">
                                    <li>
                                        <span class="pname">Цена дистрибютер за штуку</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->price_D_ht}} ₽</span>
                                    </li>

                                    <li>
                                        <span class="pname">Цена дистрибютер за кг</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->price_D_kg}} ₽</span>
                                    </li>

                                    <li>
                                        <span class="pname">Цена опт за штуку</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->param_ves_yashik}} ₽</span>
                                    </li>

                                    <li>
                                        <span class="pname">Цена опт за кг</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->param_count_in_pack}} ₽</span>
                                    </li>

                                    <li>
                                        <span class="pname">Цена розница за штуку</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->price_R_ht}} ₽</span>
                                    </li>

                                    <li>
                                        <span class="pname">Цена розница за кг</span>
                                        <span class="sep"></span>
                                        <span class="pvalue">{{$productinfo->price_R_kg}} ₽</span>
                                    </li>
                                </ul>
                            </template>
                        </acordion-element>





                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="upsale">
        <div class="_container">
            <h2>Смотрите также</h2>
            <div class="product_cat_list">
                {{-- @for ($i = 0; $i<4; $i++)
                    <x-product-card></x-product-card>
                @endfor --}}
            </div>
        </div>
    </section>

    <x-advantages></x-advantages>

@endsection
