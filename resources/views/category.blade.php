@extends('layouts.all', ['no_footer_line' => true])

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

            <div class="cat_select_in_page">
                <a href="" class="cat_element active">Сыры полутвердые весовые</a>
                <a href="" class="cat_element">Сыры фасованные</a>
                <a href="" class="cat_element">Сыры твердые весовые</a>
                <a href="" class="cat_element">Сыр плавленный фасованный</a>
                <a href="" class="cat_element">Масло сливочное фасованное</a>
                <a href="" class="cat_element">Масло сливочное с наполнителями фасованное</a>
                <a href="" class="cat_element">Масло сливочное с наполнителям весовое</a>
            </div>

            <div class="product_cat_list">
                @for ($i = 0; $i<8; $i++)
                    <x-product-card></x-product-card>
                @endfor

            </div>
        </div>
    </section>

    <x-advantages></x-advantages>

@endsection
