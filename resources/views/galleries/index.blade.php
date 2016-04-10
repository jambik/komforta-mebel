@extends('layouts.app')

@section('title', 'Наше портфолио')

@section('content')

    <div class="categories-list">
        @foreach($galleries as $gallery)
            <div class="media category">
                <div class="media-left media-middle">
                    <div class="image"><a href="{{ url('/galleries/' . $gallery->slug) }}"><img src="{{ $gallery->image ? '/images/small/' . $gallery->img_url . $gallery->image : '/img/default.png' }}"></a></div>
                </div>
                <div class="media-body media-middle">
                    <div class="name"><a href="{{ url('/galleries/' . $gallery->slug) }}">{{ $gallery->name }}</a></div>
                    @if ($gallery->text)<p>{{ str_limit($gallery->text, 150, '...') }}</p>@endif
                </div>
            </div>
        @endforeach
    </div>

@endsection