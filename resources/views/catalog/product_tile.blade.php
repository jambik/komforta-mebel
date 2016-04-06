<div class="col-lg-4">
    <div class="product-tile">
        <div class="img"><a href="{{ route('catalog.product', $product->slug) }}"><img src="{{ $product->image ? '/images/large/' . $product->img_url . $product->image : '/img/default.png' }}" class="img-responsive"></a></div>
        <div class="name"><a href="{{ route('catalog.product', $product->slug) }}">{{ $product->name }}</a></div>
        <div class="price">Базовая стоимость: <span>от {{ $product->price }} руб.</span></div>
        <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
        <a href="{{ route('catalog.product', $product->slug) }}" class="more">Подробнее</a>
    </div>
</div>