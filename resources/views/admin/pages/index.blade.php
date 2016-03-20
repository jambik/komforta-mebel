@extends('admin.page', ['title' => "Администрирование - Новости - Sellmecar"])

@section('content')
    <h4 class="center">Страницы</h4>
    <p><a href="{{ route('admin.pages.create') }}" class="btn waves-effect waves-light"><i class="material-icons left">add_circle</i> Добавить</a></p>

    <table id="table_items">
        <thead>
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th>Текст новости</th>
                <th class="btn-collumn filter-false" data-sorter="false"></th>
                <th class="btn-collumn filter-false" data-sorter="false"></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th colspan="5" class="pager form-inline">
                    <button type="button" class="btn first"><i class="material-icons">first_page</i></button>
                    <button type="button" class="btn prev"><i class="material-icons">navigate_before</i></button>
                    <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
                    <button type="button" class="btn next"><i class="material-icons">navigate_next</i></button>
                    <button type="button" class="btn last"><i class="material-icons">last_page</i></button>
                    <div class="input-field col s3">
                        <select class="pagesize" title="Размер страницы">
                            <option selected="selected" value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                        </select>
                        <label>Размер страницы</label>
                    </div>
                    {{--<div class="input-field col s3">--}}
                        <select class="gotoPage" title="Номер страницы"></select>
                    {{--</div>--}}
                </th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ str_limit(strip_tags($item->text), 300) }}</td>
                    <td><a href="{{ route('admin.pages.edit', $item->id) }}" class="btn"><i class="material-icons">edit</i></a></td>
                    <td>
                        {!! Form::open(['url' => route('admin.pages.destroy', $item->id), 'method' => 'DELETE']) !!}
                            <button type="submit" class="btn red darken-2" onclick="return confirm('Вы действительно хотите удалить запись #{{ $item->id }}');"><i class="material-icons">delete</i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
