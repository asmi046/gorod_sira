@extends('layouts.all', ['no_footer_line' => true])

@php
    $title = "Контакты нашей компании";
    $description = "Контакты нашей компании - свяжитесь с нами любым удобным для вас способом.";
@endphp

@section('title', $title)
@section('description', $description)

@section('content')

    <section class="contact_page big_pd">
        <div class="_container">
            <x-breadcrumbs :title="$title"></x-breadcrumbs>

            <h1 class="h1_pahe">{{$title}}</h1>

            <div class="contact_data">
                <h2>{{$options["organization"]}}</h2>
                <a href="tel:{{$options["phone"]}}" class="phone">{{$options["phone"]}}</a>
                <span><a href="tel:{{$options["phone_op"]}}" class="phone_op">{{$options["phone_op"]}}</a> - отдел продаж</span>
                {{-- <a href="mailto:{{$options["email"]}}" class="mail">{{$options["email"]}}</a> --}}
                <a href="mailto:{{$options["email1"]}}" class="mail">{{$options["email1"]}}</a>
                <a href="mailto:{{$options["email2"]}}" class="mail">{{$options["email2"]}}</a>


                <a target="_blank" href="{{asset('files/karta_kontragenta_vtb.pdf')}}" class="ca_card">Скачать карточку контрагента: {{$options["organization"]}}</a>

                <h3>Адрес:</h3>
                <p class="adress">{{$options["adress"]}}</p>
            </div>

            <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
            <div class="render_map" id="render_map">

            </div>
        </div>
    </section>


    <x-advantages></x-advantages>

@endsection
