<div class="col-sm-12">
    <div class="product-list">
        <div class="img">
            @if ($product->image)
                <a class="popup-product" title="{{ $product->name }}" href="/images/original/{{ $product->img_url . $product->image }}">
                    <img src="/images/large/{{ $product->img_url . $product->image }}" class="img-responsive img-thumbnail">
                </a>
            @else
                <img src="/img/default.png" class="img-responsive img-thumbnail img-rounded">
            @endif
        </div>
        <div class="info">
            <div class="name"><a href="{{ route('catalog.product', $product->slug) }}">{{ $product->name }}</a></div>
            <div class="price">Базовая стоимость: <span>от {{ $product->price }} руб.</span></div>
            <div class="brief">{{ str_limit($product->brief, 300) }}</div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>