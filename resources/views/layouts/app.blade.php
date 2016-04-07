<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>

    <!-- Styles -->
    <link href="{{ asset('/css/app.bundle.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" type="text/css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Scripts -->
    <script src="{{ asset('/js/app.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('header_scripts')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>@yield('title')</title>
</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 logo">
                <div class="logo-img">
                    <a href="/"><img src="{{ asset('img/logo.png') }}" class="img-responsive"></a>
                </div>
                <div class="logo-text">
                    <div class="site-name">мебель<br>КОМФОРТА</div>
                    <div class="slogan">У нас свое производство</div>
                </div>
            </div>
            <div class="col-lg-3 phones">
                <div class="phone">
                    Телефон: <span>+7 (495) 123-45-67</span>
                </div>
                <div class="phone-icons">
                    <img src="{{ asset('img/phone.png') }}">
                </div>
            </div>
            <div class="col-lg-5 contacts text-right">
                <div class="address">г.Москва, Алтуфьевское шоссе 33</div>
                <div class="email">E-mail: info@mebel-kf.ru</div>
                <div class="row search">
                    <form action="#search" method="GET" class="col-lg-6">
                        <input type="text" class="form-control input-sm" name="search" placeholder="поиск по сайту">
                    </form>
                    <div class="col-lg-6">
                        <select class="form-control input-sm">
                            <option>Выбрать шкаф купе</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<nav>
    <div class="container">
        <div class="row">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="{{ url('/page/o-kompanii') }}">О компании</a></li>
                <li><a href="{{ url('/page/kak-sdelat-zakaz') }}">Как сделать заказ</a></li>
                <li><a href="{{ url('/catalog') }}">Каталог</a></li>
                <li><a href="{{ url('/articles') }}">Статьи</a></li>
                <li><a href="{{ url('/page/proizvodstvo') }}">Производство</a></li>
                <li><a href="{{ url('/page/nashe-portfolio') }}">Наше портфолио</a></li>
                <li><a href="{{ url('/page/nashi-kontakty') }}">Наши контакты</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('slider')

<section id="blocks">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="block block-callback">
                    <div>Обратный звонок</div>
                    <p>Мы Вам перезвоним</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="block block-calculate">
                    <div><a href="{{ route('calculation') }}">Онлайн расчет</a></div>
                    <p>Удобно и быстро</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="block block-measure">
                    <div>Замер и Дизайн</div>
                    <p>Выезд бесплатно</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="block block-delivery">
                    <div>Доставка</div>
                    <p>Ознакомиться с условиями</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="caption-1">Каталог</div>
                <div class="categories">
                    <div class="categories-top"></div>
                    <div class="categories-middle">
                        @include('partials._categories')
                    </div>
                    <div class="categories-bottom"></div>
                </div>
            </div>
            <div class="col-lg-9">
                @yield('content')
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="copyright">копирайт</div>
        </div>
        <div class="row">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="{{ url('/page/o-kompanii') }}">О компании</a></li>
                <li><a href="{{ url('/page/kak-sdelat-zakaz') }}">Как сделать заказ</a></li>
                <li><a href="{{ url('/catalog') }}">Каталог</a></li>
                <li><a href="{{ url('/articles') }}">Статьи</a></li>
                <li><a href="{{ url('/page/proizvodstvo') }}">Производство</a></li>
                <li><a href="{{ url('/page/nashe-portfolio') }}">Наше портфолио</a></li>
                <li><a href="{{ url('/page/nashi-kontakty') }}">Наши контакты</a></li>
            </ul>
        </div>
    </div>
</footer>

@include('partials._flash')
@yield('footer_scripts')
</body>
</html>