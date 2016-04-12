<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="product-tile">
        <div class="img">
            @if ($product->image)
                <a class="popup-product" title="{{ $product->name }}" href="/images/original/{{ $product->img_url . $product->image }}">
                    <img src="/images/large/{{ $product->img_url . $product->image }}" class="img-responsive">
                </a>
            @else
                <img src="/img/default.png" class="img-responsive">
            @endif
        </div>
        <div class="name"><a href="{{ route('catalog.product', $product->slug) }}">{{ $product->name }}</a></div>
        <div class="price">Базовая стоимость: <span>от {{ $product->price }} руб.</span></div>
        <div class="btn-round"><a href="#" onclick="$('#request-design-product').html('{{ $product->name }}'); $('#request-design-product').next().val('{{ $product->name }}'); return false;" data-toggle="modal" data-target="#requestDesignModal">Заказать дизайн/замер</a></div>
        <a href="{{ route('catalog.product', $product->slug) }}" class="more">Подробнее</a>
    </div>
</div>