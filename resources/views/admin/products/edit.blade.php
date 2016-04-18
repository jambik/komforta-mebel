@extends('admin.page', ['title' => "Продукты"])

@section('content')
	<h4 class="center">Редактировать</h4>
	<div class="row">
		<div class="col l8 offset-l2 m12">
            <ul class="tabs z-depth-1 hoverable">
                <li class="tab col s6"><a href="#tab1">Основные свойства</a></li>
                <li class="tab col s6"><a href="#tab2">Фотографии</a></li>
            </ul>
            <div>&nbsp;</div>
			<div id="tab1" class="row">
				{!! Form::model($item, ['url' => route('admin.products.update', $item->id), 'method' => 'PUT', 'files' => true]) !!}
					@include('admin.products.form', ['submitButtonText' => 'Обновить'])
				{!! Form::close() !!}
			</div>

			<div id="tab2" class="row">
				<form action="{{ route('admin.products.photo', $item->id) }}" method="POST" class="dropzone teal lighten-5" id="photos-dropzone">
                    {{ csrf_field() }}
                    <div class="dz-message">
                        <h5>Перетащите файлы или нажмите сюда, чтобы закачать фото.</h5>
                    </div>
                </form>

                @if ($item->photos->count())
                    <p>&nbsp;</p>
                    <table id="table_photos" class="striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Фото</th>
                                <th>Описание</th>
                                <th>Порядок</th>
                                <th class="filter-false btn-collumn" data-sorter="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($item->photos as $photo)
                                <tr>
                                    <td>{{ $photo->id }}</td>
                                    <td><img src='/images/small/{{ $item->img_url.$photo->image }}'></td>
                                    <td>{{ $photo->name }}</td>
                                    <td>{{ $photo->order }}</td>
                                    <td><button onclick="confirmDelete(this, '{{ $photo->id }}', '{{ route('admin.products.photo.delete', [$item->id, $photo->id]) }}')" class="btn btn-small waves-effect waves-light red darken-2"><i class="material-icons">delete</i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
			</div>
		</div>
	</div>
@endsection
