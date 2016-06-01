@extends('layouts.app')

@section('title', 'Мебель комфорта - Поиск')

@section('slides')
    @include('partials._slides')
@endsection

@section('content')
    <h1>Поиск</h1>
    @if ($products->count())
        <div class="caption-block"><div>поиск по тексту <code>"{{ request('search') }}"</code></div></div>
        <div class="row products-list">
            @each('catalog.product_list', $products, 'product')
        </div>
    @endif
@endsection