@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/catalog') }}">Каталог</a></li>
        @foreach ($category->ancestors()->get() as $value)
            <li><a href="{{ route('catalog.category', $value->slug) }}">{{ $value->name }}</a></li>
        @endforeach
        <li class="active"><a href="{{ route('catalog.category', $category->slug) }}">{{ $category->name }}</a></li>
    </ol>

    <h1>{{ $product->name }}</h1>
@endsection