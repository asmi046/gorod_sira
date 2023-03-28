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
            <x-breadcrumbs :title="'Продукция'"></x-breadcrumbs>

            <h1 class="h1_pahe">Продукция</h1>

            <div class="product_cat_list">
                @foreach ($categories as $item)
                    <x-product-cat-card :item="$item"></x-product-cat-card>
                @endforeach

            </div>
        </div>

    </section>

    <x-advantages></x-advantages>

@endsection
