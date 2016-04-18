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
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="name" placeholder="Ваше Имя *" value="{{ old('name') }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="phone" placeholder="Телефон" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>
            </div>
        </div>
        <p>&nbsp;</p>

        <div class="row">
            <div class="caption-block-grey">Материалы для фасада:</div>
            @foreach (trans('vars.material') as $key => $val)
                <div class="col-lg-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="material[]" value="{{ $key }}" id="material_{{ $key }}"{{ (is_array( old('material')) && in_array($key, old('material'))) ? ' checked' : '' }}> {{ $val }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <p>&nbsp;</p>

        <div class="row">
            <div class="caption-block-grey">Вид гарнитуры:</div>
            <div class="col-lg-6">
                @foreach (trans('vars.furniture_type') as $key => $val)
                    <div class="checkbox">
                        <label>
                            <input type="radio" onchange="changeFurnitureType(this)" data-img="{{ $val['img'] }}" name="furniture_type" id="furniture_type_{{ $key }}" value="{{ $key }}"{{ old('furniture_type') == $key ? ' checked' : '' }}> {{ $val['name'] }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-6" id="furnitureTypeImage"></div>
        </div>
        <p>&nbsp;</p>

        <div class="row">
            <div class="caption-block-grey">Высота верхних шкафов:</div>
            <div class="col-lg-6">
                <select name="cupboard_height" id="cupboard_height" class="form-control">
                    @foreach ($cupboardHeights as $key => $val)<option value="{{ $key }}"{{ old('cupboard_height') == $key ? ' selected' : '' }}>{{ $val }}</option>@endforeach
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
                            <input type="checkbox" name="equipment[]" value="{{ $key }}" id="equipment_{{ $key }}"{{ (is_array( old('equipment')) && in_array($key, old('equipment'))) ? ' checked' : '' }}> {{ $val }}
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
        <div>&nbsp;</div>

        <div class="form-group">
            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
        </div>
        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-warning">Заявка на расчет</button>
        </div>
    </form>
@endsection

@section('header_scripts')
    <script src='https://www.google.com/recaptcha/api.js?hl=ru'></script>
@endsection