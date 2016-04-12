@extends('layouts.app')

@section('title', 'Каталог')

@section('content')

    <div>
        @foreach($categories as $category)
            @if ($category->products->count())
                <div class="caption-block"><div>{{ $category->name }}<a href="{{ url('/catalog/' . $category->slug) }}">подробнее</a></div></div>
                <div class="row products-tiles">
                    @each('catalog.product_tile', $category->products()->limit(3)->get(), 'product')
                </div>
            @endif
        @endforeach
    </div>

@endsection