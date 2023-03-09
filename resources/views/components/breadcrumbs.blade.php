<div class="breadcrumbs">
    <a href="{{route('home')}}">Главная</a>

    @if (isset($title))
        <span class="sep"> / </span> <span class="finish">{{ $title }}</span>
    @endif

    @if (isset($product))
        <span class="sep"> / <a href="{{route("products")}}">Продукция</a>  / </span> <span class="finish">{{ $product }}</span>
    @endif

    @if (isset($productpage))
        <span class="sep"> / <a href="{{route("products")}}">Продукция</a> / <a href="{{route('products_cat', $catslug)}}">{{$cattitle}}</a> / </span> <span class="finish">{{ $productpage }}</span>
    @endif

 </div>
