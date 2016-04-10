@extends('layouts.app')

@section('title', 'Мебель комфорта')

@section('slides')
    @include('partials._slides')
@endsection

@section('content')
    <div class="caption-block"><div>Кухни от производителя<a href="#">подробнее</a></div></div>
    <div class="row products-tiles">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="product-tile">
                <div class="img"><img src="{{ asset('img/product-1.jpg') }}" class="img-responsive"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Заказать дизайн/замер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="product-tile">
                <div class="img"><img src="{{ asset('img/product-2.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Заказать дизайн/замер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="product-tile">
                <div class="img"><img src="{{ asset('img/product-3.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Заказать дизайн/замер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
    </div>

    <div class="caption-block"><div>Шкафы-купе<a href="#">подробнее</a></div></div>
    <div class="row products-tiles">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="product-tile">
                <div class="img"><img src="{{ asset('img/product-6.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Заказать дизайн/замер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="product-tile">
                <div class="img"><img src="{{ asset('img/product-5.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Заказать дизайн/замер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="product-tile">
                <div class="img"><img src="{{ asset('img/product-4.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Заказать дизайн/замер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="product-tile">
                <div class="img"><img src="{{ asset('img/product-3.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Заказать дизайн/замер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="product-tile">
                <div class="img"><img src="{{ asset('img/product-2.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Заказать дизайн/замер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="product-tile">
                <div class="img"><img src="{{ asset('img/product-1.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Заказать дизайн/замер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
    </div>

    {!! $page->text !!}
@endsection