@extends('layouts.app_index')

@section('title', 'Мебель комфорта')

@section('content')
    {!! $page->text !!}

    <div class="caption-block"><div>Кухни от производителя<a href="#">подробнее</a></div></div>
    <div class="row products-tiles">
        <div class="col-lg-4">
            <div class="product">
                <div class="img"><img src="{{ asset('img/product-1.jpg') }}" class="img-responsive"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product">
                <div class="img"><img src="{{ asset('img/product-2.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product">
                <div class="img"><img src="{{ asset('img/product-3.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
    </div>

    <div class="caption-block"><div>Шкафы-купе<a href="#">подробнее</a></div></div>
    <div class="row products-tiles">
        <div class="col-lg-4">
            <div class="product">
                <div class="img"><img src="{{ asset('img/product-6.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product">
                <div class="img"><img src="{{ asset('img/product-5.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product">
                <div class="img"><img src="{{ asset('img/product-4.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product">
                <div class="img"><img src="{{ asset('img/product-3.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product">
                <div class="img"><img src="{{ asset('img/product-2.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product">
                <div class="img"><img src="{{ asset('img/product-1.jpg') }}"></div>
                <div class="name">Кухня тоскана</div>
                <div class="price">Базовая стоимость: <span>от 16 000 руб.</span></div>
                <div class="btn-round"><a href="#">Замерщик-дизайнер</a></div>
                <a href="#" class="more">Подробнее</a>
            </div>
        </div>
    </div>

    <p>&nbsp;</p>
    <div class="text-center text-xl">Немного о нас</div>
    <p>&nbsp;</p>
    <p>- Доступность. Все кухни производятся в широком диапазоне цен: от бюджетных решений до элитных альтернатив. Искать для себя подходящий вариант - легко и увлекательно.</p>
    <p>- Высокое качество. Выпуская мебель для кухни, специалисты фабрики Форема стремятся к западным стандартам. Это предполагает тщательный выбор сырья, безупречное соблюдение размеров, а также аккуратную сборку изделий.</p>
    <p>- Широкий выбор. Продажа кухонной мебели включает в себя сотни различных вариантов: как по стилю, так и по основному материалу гарнитура, оформлению, цветовой гамме.</p>
    <p>- Товары от производителя. Продукция поставляется от изготовителя, что обуславливает её доступность и возможность адаптировать решения под себя.</p>
    <p>Рассрочка. У Вас есть уникальная возможность купить кухонную мебель на условиях отсроченного платежа. Это отличное решение для молодых семей, студентов и тех, кто лишь недавно переехал в новую квартиру и не может позволить себе дорогую покупку.</p>
    <p>Приобретая продукцию бренда, изготовленную под конкретные параметры помещения, Вы экономите площадь кухни. В состав гарнитура войдут те элементы, которые нужны именно Вам. Кухни под заказ от компании Форема отличаются безупречной точностью и великолепной геометрией. Покупать их гораздо выгоднее, нежели приобретать готовые решения. Заказчик также может выбрать оптимальный вид фурнитуры, выдвижные механизмы и другие элементы, которые впишутся в дизайн интерьера.</p>
@endsection