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
                        <acordion-element>
                            <template v-slot:acheader>
                                <p>Тест</p>
                            </template>
                        </acordion-element>

                        <div class="ppInfo_line">
                            <p>Производство</p>
                            <span class="arrow"></span>
                        </div>

                        <div class="ppInfo_line">
                            <p>Особенности</p>
                            <span class="arrow"></span>
                        </div>

                        <div class="ppInfo_line">
                            <p>Польза для организма</p>
                            <span class="arrow"></span>
                        </div>

                        <div class="ppInfo_line">
                            <p>Возможности в кулинарии</p>
                            <span class="arrow"></span>
                        </div>
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
