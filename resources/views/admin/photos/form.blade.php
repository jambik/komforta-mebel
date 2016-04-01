<div class="input-field col s12">
    {!! Form::label('name', 'Описание') !!}
    {!! Form::text('name', null, ['class' => 'validate'.($errors->has('name') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('order', 'Порядок') !!}
    {!! Form::text('order', null, ['class' => 'validate'.($errors->has('order') ? ' invalid' : '')]) !!}
</div>

<div class="col s12">
    <img src="/images/medium/{{ $item->img_url.$item->image }}" alt="" />
</div>

<div class="input-field col s12 center">
    <button type="submit" class="btn-large waves-effect waves-light"><i class="material-icons left">check_circle</i> {{ $submitButtonText }}</button>
</div>

<div class="input-field col s12 center">
    <a href="{{ route('admin.photos.index') }}" class="btn grey waves-effect waves-light">Отмена</a>
</div>