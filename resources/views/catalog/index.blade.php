@extends('layouts.app')

@section('content')

    <div class="categories-list">
        @foreach($categories as $category)
            <div class="media category">
                <div class="media-left media-middle">
                    <div class="image"><a href="{{ url('/catalog/' . $category->slug) }}"><img src="{{ $category->image ? '/images/small/' . $category->img_url . $category->image : '/img/default.png' }}"></a></div>
                </div>
                <div class="media-body media-middle">
                    <div class="name"><a href="{{ url('/catalog/' . $category->slug) }}">{{ $category->name }}</a></div>
                    @if ($category->about)<p>{{ str_limit(strip_tags($category->about), 150, '...') }}</p>@endif
                </div>
            </div>
        @endforeach
    </div>

@endsection