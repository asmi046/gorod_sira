@extends('layouts.all')

@php
    $title = "Категория товара";
    $description = "Категория товара";
@endphp

@section('title', $title)
@section('description', $description)

@section('content')
    <x-page-banner :image="'img/b_product_cat.webp'"></x-page-banner>

    <section class="product_page_content">
        <div class="_container">
            <div class="breadcrumbs">
                <a href="#">Главная</a> / <a href="#">Продукция</a> / <span>Главная</span>
            </div>

            <h1 class="h1_pahe">Масло сливочное фасованное</h1>

            <div class="product_cat_list">
                @for ($i = 0; $i<8; $i++)
                    <div class="product_cat_t">
                        <div class="img_wrap">
                            <img src="{{asset('facer/product_1.jpg')}}" alt="">
                        </div>
                        <h2>Cладко-сливочное традиционнное</h2>
                        <div class="upac">
                            — Фольга 180 г
                        </div>
                        <div class="text">
                            Приготовлено в лучших финских традициях из натуральных пастеризованных сливок. Продукт богат витаминами и минеральными веществами и отличается нежным ...
                        </div>
                    </div>
                @endfor

            </div>
        </div>

    </section>

    <x-advantages></x-advantages>

@endsection
