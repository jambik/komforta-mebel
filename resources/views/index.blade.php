@extends('layouts.app')

@section('title', 'Мебель комфорта')

@section('slides')
    @include('partials._slides')
@endsection

@section('content')
    @if ($products1->count())
        <div class="caption-block"><div>{{ $categories->find($products1[0]->category_id)->name }}<a href="{{ url('/catalog/' . $categories->find($products1[0]->category_id)->slug) }}">подробнее</a></div></div>
        <div class="row products-tiles">
            @each('catalog.product_tile', $products1, 'product')
        </div>
    @endif

    @if ($products2->count())
        <div class="caption-block"><div>{{ $categories->find($products2[0]->category_id)->name }}<a href="{{ url('/catalog/' . $categories->find($products2[0]->category_id)->slug) }}">подробнее</a></div></div>
        <div class="row products-tiles">
            @each('catalog.product_tile', $products2, 'product')
        </div>
    @endif

    @if ($products3->count())
        <div class="caption-block"><div>{{ $categories->find($products3[0]->category_id)->name }}<a href="{{ url('/catalog/' . $categories->find($products3[0]->category_id)->slug) }}">подробнее</a></div></div>
        <div class="row products-tiles">
            @each('catalog.product_tile', $products3, 'product')
        </div>
    @endif

    {!! $page->text !!}
@endsection