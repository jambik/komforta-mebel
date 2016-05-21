<ul>
    @foreach($categories as $category)
        <li class="dropdown">
            <a href="{{ route('catalog.category', $category->slug) }}" class="dropbtn depth-{{ $category->depth }}{{ request('category') == $category->id ? ' active' : '' }}">{{ $category->name }}</a>
            <div class="dropdown-content">
                <div class="title">{{ $category->name }}</div>
                <strong><a href="{{ route('catalog.category', $category->slug) }}">Показать все</a></strong>
                <div class="properties">
                    @if ($category->properties)
                        @foreach ($category->properties as $key => $properties)
                            <div class="property-block">
                                <strong>{{ trans('vars.properties.' . $key) }}:</strong>
                                @foreach ($properties as $property)
                                    <div class="property-link">- <a href="{{ route('catalog.category', $category->slug) }}?property={{ $key }}&value={{ $property }}">{{ $property }}</a></div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>