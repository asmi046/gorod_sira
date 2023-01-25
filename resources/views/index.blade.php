
@extends('layouts.all')

@php
    $title = "Производство сыра и молочьных продуктов";
    $description = "Производство сыра и молочьных продуктов";
@endphp

@section('title', $title)
@section('description', $description)

@section('content')
    <header>
            <x-menu-puncts></x-menu-puncts>

            <x-logo></x-logo>

            <x-phone></x-phone>
    </header>

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
                <img src="{{asset('img/about_bg.jpg')}}" alt="">
            </div>

            <div class="text_blk">
                <div class="inner_text">
                    <h2>О нашей компании</h2>
                    <div class="plain_text">
                        <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот</p>
                        <p>Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.</p>
                    </div>
                    <a href="" class="btn">Смотреть продукцию</a>
                </div>
            </div>
        </div>
    </section>

    <section class="advantages_main" id="advantages_main">
        <div class="_container">
            <h2>Наш сыр это</h2>
            <hr>
            <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами.</p>
            <div class="advantages_list">

                <div class="adv">
                    <div class="icon_blk icon_adv_1"></div>
                    <div class="text_blk">
                        <h3>Современное оборудование</h3>
                        <hr>
                        <p>Наше предприятие оснащено современным оборудованием высокого класса</p>
                    </div>
                </div>

                <div class="adv">
                    <div class="icon_blk icon_adv_2"></div>
                    <div class="text_blk">
                        <h3>Только <br/>лучшее сырье</h3>
                        <hr>
                        <p>Наш сыр делается из отборного молока которое проходит все необходимые стадии контроля</p>
                    </div>
                </div>

                <div class="adv">
                    <div class="icon_blk icon_adv_3"></div>
                    <div class="text_blk">
                        <h3>Стандарты производства</h3>
                        <hr>
                        <p>Наш сыр производится с соблюдение всех современных стандартов и требований</p>
                    </div>
                </div>

                <div class="adv">
                    <div class="icon_blk icon_adv_4"></div>
                    <div class="text_blk">
                        <h3>Строгий <br>контроль качества</h3>
                        <hr>
                        <p>Вся без исключения продукция подвергается строгому контролю качества при выходе с производства</p>
                    </div>
                </div>

                <div class="adv">
                    <div class="icon_blk icon_adv_5"></div>
                    <div class="text_blk">
                        <h3>Доступность продукции</h3>
                        <hr>
                        <p>Наш сыр можно купить во всех крупных торговых сетях нашей страны.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="proizvodstvo_main" id="proizvodstvo_main">
        <div class="_container">
            <h2>Наше производство</h2>
            <div class="pg_wrapper">
                <div class="gal_left_side">
                    <img src="{{asset('img/proizv/pr_gal_1.jpg')}}" alt="">
                </div>

                <div class="gal_right_side">
                    <img src="{{asset('img/proizv/pr_gal_2.jpg')}}" alt="">
                    <img src="{{asset('img/proizv/pr_gal_3.jpg')}}" alt="">
                    <img src="{{asset('img/proizv/pr_gal_4.jpg')}}" alt="">
                    <img src="{{asset('img/proizv/pr_gal_5.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="catalog_main">
        <div class="_container">
            <h2>Каталог продукции</h2>

            <div class="cat_list_main">
                <div class="cat_card">
                    <div class="img_blk">
                        <img src="{{asset('img/catalog/cat_main_1.jpg')}}" alt="">
                    </div>
                    <div class="name">Сыры фасованые</div>
                </div>


                <div class="cat_card">
                    <div class="img_blk">
                        <img src="{{asset('img/catalog/cat_main_2.jpg')}}" alt="">
                    </div>
                    <div class="name">Сыры весовые</div>
                </div>

                <div class="cat_card">
                    <div class="img_blk">
                        <img src="{{asset('img/catalog/cat_main_3.jpg')}}" alt="">
                    </div>
                    <div class="name">Масло сливочное фасованное</div>
                </div>
            </div>

            <div class="btn_blk">
                <a href="" class="btn btn_empty">Весь каталог</a>
            </div>
        </div>
    </section>

    <footer class="foooter_in_main">
        <div class="_container">
            <x-logo></x-logo>
            <x-menu-puncts></x-menu-puncts>
            <x-phone></x-phone>

        </div>
    </footer>


@endsection
