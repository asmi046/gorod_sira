<a href="" class="product_cat_t">
    <div class="img_wrap">
        <img src="{{empty($item->img)?asset('img/no-photo.jpg'):$item->img }}" alt="">
    </div>
    <h2>{{$item->title}}</h2>
    <div class="upac">
        — Фольга 180 г
    </div>
    <div class="text">
        {{$item->quote }}
    </div>
</a>
