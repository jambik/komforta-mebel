<ul>
    @foreach($categories as $category)
        <li><a href="{{ route('catalog.category', $category->slug) }}" class="depth-{{ $category->depth }}{{ request('category') == $category->id ? ' active' : '' }}">{{ $category->name }}</a></li>
    @endforeach
</ul>