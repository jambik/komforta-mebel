@extends('layouts.app')

@section('title', 'Онлайн расчет - заявка')

@section('content')
    <h1>Онлайн расчет - заявка</h1>
    <div>&nbsp;</div>
    @include('partials._status')
    @include('partials._errors')
    <form action="{{ route('calculation.send') }}" method="POST" id="form_calculation">
        {!! Form::token() !!}
        <div class="caption-block caption-block-orange"><div>Ваши данные</div></div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Ваше Имя *" value="{{ old('name') }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="Телефон *" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>
            </div>
        </div>
        <p>&nbsp;</p>

        <div class="row">
            <div class="caption-block-grey">Материалы для фасада:</div>
            @foreach (trans('vars.materials') as $key => $val)
                <div class="col-lg-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="material[{{ $key }}]" id="material_{{ $key }}"> {{ $val }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <p>&nbsp;</p>

        <div class="row">
            <div class="caption-block-grey">Вид гарнитуры:</div>
            <div class="col-lg-6">
                @foreach (trans('vars.furniture_types') as $key => $val)
                    <div class="checkbox">
                        <label>
                            <input type="radio" data-img="{{ $val['img'] }}" name="furniture_type" id="furniture_type_{{ $key }}" value="{{ $key }}"{{ old('furniture_type') == $key ? ' checked' : '' }}> {{ $val['name'] }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('img/furniture-type-p.png') }}">
            </div>
        </div>
        <p>&nbsp;</p>

        <div class="row">
            <div class="caption-block-grey">Высота верхних шкафов:</div>
            <div class="col-lg-6">
                <select name="cupboard_height" id="cupboard_height" class="form-control">
                    @foreach (trans('vars.cupboard_height') as $key => $val)<option value="{{ $key }}"{{ old('cupboard_height') == $key ? ' selected' : '' }}>{{ $val }}</option>@endforeach
                </select>
            </div>
        </div>
        <p>&nbsp;</p>

        <div class="row">
            <div class="caption-block-grey">Техника:</div>
            @foreach (trans('vars.equipment') as $key => $val)
                <div class="col-lg-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="equipment[{{ $key }}]" id="equipment_{{ $key }}"> {{ $val }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <p>&nbsp;</p>

        <div class="row">
            <div class="caption-block-grey">Дополнительная информация:</div>
            <div class="col-lg-6">
                <div class="form-group">
                    <textarea class="form-control" name="message" style="min-height: 150px;">{{ old('message') }}</textarea>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-warning">Заявка на расчет</button>
        </div>
    </form>
@endsection