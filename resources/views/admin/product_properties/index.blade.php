@extends('admin.page', ['title' => "Продукты"])

@section('content')
    <h4 class="center">Свойства Продуктов</h4>

    <div class="product_properties">
        @foreach($categories as $category)
            <div class="category">
                <div>
                    <div class="title">{{ $category->name }}</div>
                    <div class="properties">
                        @if ($category->properties)
                            @foreach ($category->properties as $key => $properties)
                                <div class="property-block">
                                    <strong>{{ trans('vars.properties.' . $key) }}</strong> -
                                    @foreach ($properties as $propertySlug => $property)
                                        @if ($property)
                                            <a class="property-link" href="{{ route('admin.product_properties.property', [$category->id, $key, $propertySlug]) }}">{{ $property }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
