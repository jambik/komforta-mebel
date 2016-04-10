@extends('layouts.app')

@section('title', $product->title ?: $product->name)

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/catalog') }}">Каталог</a></li>
        @foreach ($category->ancestors()->get() as $value)
            <li><a href="{{ route('catalog.category', $value->slug) }}">{{ $value->name }}</a></li>
        @endforeach
        <li class="active"><a href="{{ route('catalog.category', $category->slug) }}">{{ $category->name }}</a></li>
    </ol>

    <div class="row product">
        <div class="col-lg-7 images">
            @if ($product->image)
                <a class="popup-gallery" title="{{ $product->name }}" href="/images/original/{{ $product->img_url . $product->image }}"><img src="/images/large/{{ $product->img_url . $product->image }}" class="img img-responsive" alt="{{ $product->name }}"></a>
            @else
                <img src="/img/default.png" class="img img-responsive">
            @endif

            @if ($product->photos->count())
                <p class="photos">
                    @foreach ($product->photos as $val)
                        <a class="popup-gallery" title="{{ $val->name }}" href="/images/original/{{ $val->img_url . $val->image }}"><img src="/images/small/{{ $val->img_url . $val->image }}" class="photo" alt="{{ $val->name }}"></a>
                    @endforeach
                </p>
            @endif

                <a href="#" onclick="$('#request-design-product').html('{{ $product->name }}'); $('#request-design-product').next().val('{{ $product->name }}'); return false;" data-toggle="modal" data-target="#requestDesignModal" class="call-designer">Заказать дизайн/замер</a>
        </div>
        <div class="col-lg-5 info">
            <h1>{{ $product->name }}</h1>

            @if ($product->material)
                <p class="material"><strong>Материал:</strong> {{ trans('vars.material')[$product->material] }}</p>
            @endif

            <div class="price-calculate">
                <div class="price">
                    от <strong>{{ $product->price }}</strong> руб.
                    <span>расчет от погонного метра</span>
                </div>
                <div class="calculate">
                    <a href="#"><img src="{{ asset('img/calculator.png') }}"></a>
                    <span><a href="#">оставить замеры</a></span>
                </div>
                <div class="clearfix"></div>
            </div>

            @if ($product->brief)
                <p class="brief">{{ $product->brief }}</p>
            @endif
        </div>
    </div>

    @if ($sameProducts->count())
        <div class="caption-block"><div>Похожие товары</div></div>
        <div class="row products-tiles">
            @each('catalog.product_tile', $sameProducts, 'product')
        </div>
    @endif

@endsection