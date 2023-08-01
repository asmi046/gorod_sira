
@extends('layouts.all', ['no_footer_line' => false])

@php
    $title = "Производство сыра и молочных продуктов";
    $description = "Производство сыра и молочных продуктов";
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
                <video autoplay muted autoplay poster="{{asset('img/v-prv.jpg')}}" src="{{asset('video/gorod-sira-video-present.mp4')}}"></video>
            </div>

            <div class="text_blk">
                <div class="inner_text">
                    <h2>О нашей компании</h2>
                    <div class="plain_text">
                        {!! $options['about_main'] !!}
                    </div>
                    <a href="{{route('about')}}" class="btn">Подробнее о нас</a>
                </div>
            </div>
        </div>
    </section>

    <x-advantages></x-advantages>

    <section class="proizvodstvo_main" id="proizvodstvo_main">
        <div class="_container">
            <h2>Производство</h2>
            <x-proizvodstvo-photo></x-proizvodstvo-photo>
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
