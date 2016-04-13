@extends('admin.page', ['title' => "Фотографии"])

@section('content')
    <h4 class="center">Фотографии</h4>

    @if ($items->count())
        <table id="table_items" data-sortlist="[[4,1]]">
            <thead>
                <tr>
                    <th>Id</th>
                    <th class="filter-false" data-sorter="false">Фото</th>
                    <th>Описание</th>
                    <th>Порядок</th>
                    <th>Morph type</th>
                    <th>Morph id</th>
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
                        <td><img src='/images/small/{{ $item->img_url.$item->image }}'></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->order }}</td>
                        <td>{{ $item->photoable_type }}</td>
                        <td>{{ $item->photoable_id }}</td>
                        <td><a href="{{ route('admin.photos.edit', $item->id) }}" class="btn btn-small waves-effect waves-light"><i class="material-icons">edit</i></a></td>
                        <td><button onclick="confirmDelete(this, '{{ $item->id }}')" class="btn btn-small waves-effect waves-light red darken-2"><i class="material-icons">delete</i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-items"></div>
    @endif
@endsection
