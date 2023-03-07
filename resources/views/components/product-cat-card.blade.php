<a href="{{route('product_cat', $item->slug)}}" class="product_cat">
    <div class="img_wrap">
        <img src="{{empty($item->img)?asset('img/no-photo.jpg'):$item->img }}" alt="">
    </div>
    <div class="text">
        {{$item->title}}
    </div>
</a>
