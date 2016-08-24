@extends('layouts.app')

@section('title', $productPropertiesData && $productPropertiesData->title ? $productPropertiesData->title : ($category->title ?: $category->name))
@section('keywords', $productPropertiesData && $productPropertiesData->keywords ? $productPropertiesData->keywords : ($category->keywords ?: ''))
@section('description', $productPropertiesData && $productPropertiesData->description ? $productPropertiesData->description : ($category->description ?: ''))

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('catalog') }}">Каталог</a></li>
        @foreach ($category->ancestors()->get() as $value)
            <li><a href="{{ route('catalog.category', $value->slug) }}">{{ $value->name }}</a></li>
        @endforeach
        <li class="active">{{ $category->name }}</li>
    </ol>

    <h1>{{ $productPropertiesData && $productPropertiesData->name ? $productPropertiesData->name : ($category->name) }}</h1>
    <hr>

    @if ($children->count())
        <div class="row categories-list-line">
            @foreach($children as $category)
                <div class="col-lg-4">- <a href="{{ route('catalog.category', $category->slug) }}">{{ $category->name }}</a></div>
            @endforeach
        </div>
    @endif

    @if ($products->count())
        <div class="row products-tiles">
            @each('catalog.product_tile', $products, 'product')
        </div>
    @else
        <div>В этой категории нет товаров</div>
    @endif

    {!! $productPropertiesData && $productPropertiesData->text ? '<hr>' . $productPropertiesData->text : ($category->about ? '<hr>' . $category->about : '') !!}
@endsection