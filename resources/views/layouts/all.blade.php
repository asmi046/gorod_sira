<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title') - Город сыра</title>
        <meta name="description" content="@yield('description')">

        <meta property="og:locale" content="ru_RU" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="@yield('title')" />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:site_name" content="Молочная продукция - Город сыра" />
        <meta property="og:image" content="{{asset('img/og_img.jpg')}}" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta name="twitter:card" content="summary_large_image" />


        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon256.png')}}" sizes="256x256">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon128.png')}}" sizes="128x128">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon64.png')}}" sizes="64x64">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon32.png')}}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon16.png')}}" sizes="16x16">
        <link rel="icon" type="image/svg" href="{{asset('/img/favicons/fav.svg')}}" sizes="any">


        <meta name="_token" content="{{ csrf_token() }}">

        @vite([
                'resources/css/app.css',
                'resources/js/app.js',
                'public/js/mobile-menu.js',
                'public/css/style.css',
                'public/css/mobile_catalog_menu.css'
        ])

</head>
<body class="site_body" id="global_app_">
    <x-mobile-menu></x-mobile-menu>
    <header>
        <x-menu-puncts></x-menu-puncts>

        <x-logo></x-logo>

        <x-phone></x-phone>

        <div id="burger_element" class="icon-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>

    @yield('content')

    <x-footer :line="$no_footer_line"></x-footer>

    @vite([
        'public/js/map.js',
    ])

</body>
</html>
