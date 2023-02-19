@extends('layouts.all', ['no_footer_line' => true])

@php
    $title = "Производство сыра и молочьных продуктов";
    $description = "Производство сыра и молочьных продуктов";
@endphp

@section('title', $title)
@section('description', $description)


@section('content')
    <section class="bn_in_product_page">
        <img src="{{asset('img/b_product.jpg')}}" alt="">
        <div class="milk_layer"></div>
    </section>

    <section class="product_page_content">
        <div class="_container">
            <div class="breadcrumbs">
                <a href="#">Главная</a> / <span>Продукция</span>
            </div>

            <h1 class="h1_pahe">Продукция</h1>

            <div class="product_cat_list">
                @for ($i = 0; $i<8; $i++)
                    <div class="product_cat">
                        <div class="img_wrap">
                            <img src="{{asset('img/product_tmp_img.webp')}}" alt="">
                        </div>
                        <div class="text">
                            Сыры полутвердые весовые
                        </div>
                    </div>
                @endfor

            </div>
        </div>

    </section>

    <x-advantages></x-advantages>

@endsection
