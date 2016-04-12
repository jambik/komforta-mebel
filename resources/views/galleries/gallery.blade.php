@extends('layouts.app')

@section('title', $gallery->name)

@section('content')
    <div><a href="{{ route('galleries') }}"><i class="fa fa-chevron-left"></i> все альбомы</a></div>
    <h1>{{ $gallery->name }}</h1>
    <hr>
    <div>&nbsp;</div>
    @if ($gallery->photos->count())
        <div class="gallery-photos">
            @foreach ($gallery->photos as $val)
                <a class="popup-gallery" title="{{ $val->name }}" href="/images/original/{{ $val->img_url . $val->image }}"><img src="/images/small/{{ $val->img_url . $val->image }}" class="img-thumbnail" alt="{{ $val->name }}"></a>
            @endforeach
        </div>
    @else
        <div>В этой фотогалерее пока нет фотографий</div>
    @endif
@endsection