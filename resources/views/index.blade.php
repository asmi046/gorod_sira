
@extends('layouts.all', ['no_footer_line' => false])

@php
    $title = "Производство сыра и молочьных продуктов";
    $description = "Производство сыра и молочьных продуктов";
@endphp

@section('title', $title)
@section('description', $description)

@section('content')


    <section class="main_banner" id="main_banner">
        <div class="_container">
            <span>Качественная молочная продукция</span>
            <h1>

                Город Сыра
            </h1>
            <a href="" class="btn">Каталог</a>
        </div>
    </section>

    <section class="about_main" id="about_main">
        <div class="_container">
            <div class="photo_blk">
                <img src="{{asset('img/about_bg.jpg')}}" alt="">
            </div>

            <div class="text_blk">
                <div class="inner_text">
                    <h2>О нашей компании</h2>
                    <div class="plain_text">
                        <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот</p>
                        <p>Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.</p>
                    </div>
                    <a href="" class="btn">Смотреть продукцию</a>
                </div>
            </div>
        </div>
    </section>

    <x-advantages></x-advantages>

    <section class="proizvodstvo_main" id="proizvodstvo_main">
        <div class="_container">
            <h2>Наше производство</h2>
            <div class="pg_wrapper">
                <div class="gal_left_side">
                    <img src="{{asset('img/proizv/pr_gal_1.jpg')}}" alt="">
                </div>

                <div class="gal_right_side">
                    <img src="{{asset('img/proizv/pr_gal_2.jpg')}}" alt="">
                    <img src="{{asset('img/proizv/pr_gal_3.jpg')}}" alt="">
                    <img src="{{asset('img/proizv/pr_gal_4.jpg')}}" alt="">
                    <img src="{{asset('img/proizv/pr_gal_5.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="catalog_main">
        <div class="_container">
            <h2>Каталог продукции</h2>



            <div class="cat_list_main product_cat_list">
                @foreach ($categories as $item)
                    <x-product-cat-card :item="$item"></x-product-cat-card>
                @endforeach

            </div>

            <div class="btn_blk">
                <a href="{{route("products")}}" class="btn btn_empty">
                    Весь каталог
                </a>
            </div>
        </div>
    </section>

@endsection
