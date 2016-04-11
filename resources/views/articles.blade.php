@extends('layouts.app')

@section('title', isset($article) ? $article->title : 'Статьи')

@section('content')
    @if (isset($articles))
        <h1>Статьи</h1>
        <div>&nbsp;</div>
        <div class="articles-list">
            @foreach($articles as $value)
                <div class="item">
                    <div class="name"><a href="{{ route('articles.show', $value->slug) }}">{{ $value->name }}</a></div>
                    <p>{{ str_limit(strip_tags($value->text), 150, '...') }}</p>
                </div>
            @endforeach
        </div>
    @endif

    @if (isset($article))
        <div><a href="{{ route('articles') }}"><i class="fa fa-chevron-left"></i> все статьи</a></div>
        <h1>{{ $article->name }}</h1>
        {!! $article->text !!}
    @endif
@endsection