@extends('layouts.all', ['no_footer_line' => true])

@php
    $title = "О компании";
    $description = "Рыльский сыродел - крупнейший в регионе производитель масла и сыра.";
@endphp

@section('title', $title)
@section('description', $description)

@section('content')

    <section class="product_page_content big_pd">
        <div class="_container">
            <x-breadcrumbs :title="$title"></x-breadcrumbs>
            <h1 class="h1_pahe">{{$title}}</h1>

            <div class="text_blk margin_bottom_30">
                {!! $options['about'] !!}
            </div>
            <h2>Наше производство</h2>
            <x-proizvodstvo-photo></x-proizvodstvo-photo>
        </div>
    </section>


    <x-advantages></x-advantages>

@endsection
