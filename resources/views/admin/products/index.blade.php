@extends('admin.page', ['title' => "Продукты"])

@section('content')
    <h4 class="center">Продукты</h4>

    <div class="row">
        <div class="col s3">
            <div class="collection">
                <a href="{{ route('admin.products.index') }}" class="collection-item blue-grey lighten-2 white-text"><strong>Категории</strong></a>
                @foreach($categories as $category)
                    <a href="{{ route('admin.products.index').'?category='.$category->id }}" class="collection-item depth-{{ $category->depth }}{{ request('category') == $category->id ? ' active' : '' }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col s9">
            <p><a href="{{ route('admin.products.create') }}" class="btn waves-effect waves-light"><i class="material-icons left">add_circle</i> Добавить</a></p>

            <table id="table_items">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th>Доступность</th>
                    <th class="filter-false btn-collumn" data-sorter="false"></th>
                    <th class="filter-false btn-collumn" data-sorter="false"></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th colspan="8" class="pager form-inline">
                        <button type="button" class="btn btn-small waves-effect waves-light first"><i class="material-icons">first_page</i></button>
                        <button type="button" class="btn btn-small waves-effect waves-light prev"><i class="material-icons">navigate_before</i></button>
                        <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
                        <button type="button" class="btn btn-small waves-effect waves-light next"><i class="material-icons">navigate_next</i></button>
                        <button type="button" class="btn btn-small waves-effect waves-light last"><i class="material-icons">last_page</i></button>
                        <select class="pagesize" title="Размер страницы">
                            <option selected="selected" value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <select class="gotoPage" title="Номер страницы"></select>
                    </th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>@if ($item->image)<img src='/images/small/{{ $item->img_url.$item->image }}' alt='' />@endif</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ str_limit($item->brief, 150, '...') }}</td>
                        <td>{{ $item->available ? 'есть' : 'нет' }}</td>
                        <td><a href="{{ route('admin.products.edit', $item->id) }}" class="btn btn-small waves-effect waves-light"><i class="material-icons">edit</i></a></td>
                        <td><button onclick="confirmDelete(this, '{{ $item->id }}')" class="btn btn-small waves-effect waves-light red darken-2"><i class="material-icons">delete</i></button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
