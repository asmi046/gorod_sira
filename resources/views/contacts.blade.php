@extends('layouts.all', ['no_footer_line' => true])

@php
    $title = "Контакты нашей компании";
    $description = "Контакты нашей компании - свяжитесь с нами любым удобным для вас способом.";
@endphp

@section('title', $title)
@section('description', $description)

@section('content')

    <section class="product_page_content big_pd">
        <div class="_container">
            <div class="breadcrumbs">
                <a href="#">Главная</a> / <a href="#">Продукция</a> / <span>Главная</span>
            </div>
            <h1 class="h1_pahe">{{$title}}</h1>
        </div>
    </section>


    <x-advantages></x-advantages>

@endsection
