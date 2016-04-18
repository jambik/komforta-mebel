<p>Заявка на расчет</p>
<br>
<div>Контактные данные:</div>
<div>----------------------------------------</div>
<div>Имя: {{ $input['name'] }}</div>
<div>Телефон: {{ $input['phone'] }}</div>
<div>Email: {{ $input['email'] }}</div>

<br>
<div>Пожелания:</div>
<div>----------------------------------------</div>
<div>
    Материалы для фасада:
    @if (isset($input['material']))
        @foreach ($input['material'] as $val)
            {{ $vars['material'][$val] }},
        @endforeach
    @endif
</div>
<div>
    Вид гарнитуры:
    @if (isset($input['furniture_type']))
        {{ $vars['furniture_type'][$input['furniture_type']]['name'] }}
    @endif
</div>
<div>
    Высота верхних шкафов:
    {{ $cupboardHeights[$input['cupboard_height']] }}
</div>
<div>
    Техника:
    @if (isset($input['equipment']))
        @foreach ($input['equipment'] as $val)
            {{ $vars['equipment'][$val] }},
        @endforeach
    @endif
</div>

<br>
<div>Дополнительная информация:</div>
<div>-----------------------------------------</div>
<div>Сообщение: {{ $input['message'] }}</div>