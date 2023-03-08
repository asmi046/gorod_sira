<a href="{{route('product_page', $item->slug)}}" class="product_cat_t">
    <div class="img_wrap">
        <img src="{{empty($item->img)?asset('img/no-photo.jpg'):$item->img }}" alt="">
    </div>
    <h2>{{$item->title}}</h2>
    <div class="upac">
        — {{$item->upacovka}} {{$item->param_ves_ed}} г
    </div>
    <div class="text">
        {{$item->quote }}
    </div>
</a>
