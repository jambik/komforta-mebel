@extends('layouts.app')

@section('title', isset($newsItem) ? $newsItem->title : 'Новости')

@section('content')
    @if (isset($news))
        <h1>Новости</h1>
        <div>&nbsp;</div>
        <div class="news-list">
            @foreach($news as $value)
                <div class="media">
                    <div class="media-left media-middle">
                        <div class="image"><a href="{{ route('news.show', $value->id) }}"><img src="{{ $value->image ? '/images/small/' . $value->img_url . $value->image : '/img/default.png' }}"></a></div>
                    </div>
                    <div class="media-body media-middle">
                        <div class="name"><a href="{{ route('news.show', $value->id) }}">{{ $value->title }}</a></div>
                        @if ($value->text)<p>{{ str_limit(strip_tags($value->text), 150, '...') }}</p>@endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if (isset($newsItem))
        <div><a href="{{ route('news') }}"><i class="fa fa-chevron-left"></i> все новости</a></div>
        <h1>{{ $newsItem->title }}</h1>
        {!! $newsItem->text !!}
        <div class="news-date"><i class="fa fa-clock-o"></i> {{ $newsItem->published_at }}</div>
    @endif
@endsection