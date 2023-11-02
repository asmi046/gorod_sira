@extends('layouts.all', ['no_footer_line' => true])

@php
    $title = $catinfo["seo_title"];
    $description = $catinfo["seo_description"];
@endphp

@section('title', $title)
@section('description', $description)

@section('content')
    <x-page-banner :image="'img/b_product_cat.webp'"></x-page-banner>

    <section class="product_page_content">
        <div class="_container">

            <x-breadcrumbs :category="$catinfo['title']"></x-breadcrumbs>

            <h1 class="h1_pahe">{{$catinfo["title"]}}</h1>

            <div class="cat_select_in_page">
                @foreach ($categories as $item)
                    <a href="{{route('product_cat', $item->slug)}}" @class(['cat_element', 'active' => ($item->slug === $catinfo->slug)]) >{{$item->title}}</a>
                @endforeach


            </div>

            <div class="product_cat_list">
                @foreach ($catinfo->cat_product()->orderBy('order')->get() as $item)
                    <x-product-card :item="$item"></x-product-card>
                @endforeach


            </div>
        </div>
    </section>

    <x-advantages></x-advantages>

@endsection
