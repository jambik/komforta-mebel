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

    {{--vkontakte--}}
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>
    <script type="text/javascript">VK.init({apiId: 5412143, onlyWidgets: true});</script>

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
        <div class="row logo-row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                    <span class="sr-only">Меню</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 logo">
                <div class="logo-img">
                    <a href="/"><img src="{{ asset('img/logo.png') }}" class="img-responsive"></a>
                </div>
                <div class="logo-text">
                    <div class="site-name">мебель<br>КОМФОРТА</div>
                    <div class="slogan">У нас свое производство</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 phones hidden-xs">
                <div class="phone text-right">
                    Телефон: <span>{{ $settings->phone }}</span>
                </div>
                <div class="phone-icons">
                    <img src="{{ asset('img/phone.png') }}">
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6 contacts text-right hidden-xs">
                <div class="address">{{ $settings->address }}</div>
                <div class="email">E-mail: {{ $settings->email }}</div>
                <div class="row search">
                    <form action="{{ route('search') }}" method="GET" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <input type="text" class="form-control input-sm" name="search" placeholder="поиск по сайту">
                    </form>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <select class="form-control input-sm" onchange="document.location = $(this).val();">
                            <option value="" selected disabled>- Выберите категорию -</option>
                            @foreach($categories as $category)
                                <option value="{{ route('catalog.category', $category->slug) }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<nav class="collapse navbar-collapse" id="navbar">
    <div class="container">
        <div class="row">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="{{ url('/page/o-kompanii') }}">О компании</a></li>
                <li><a href="{{ url('/page/kak-sdelat-zakaz') }}">Как сделать заказ</a></li>
                <li><a href="{{ route('catalog') }}">Каталог</a></li>
                <li><a href="{{ route('articles') }}">Статьи</a></li>
                <li><a href="{{ url('/page/proizvodstvo') }}">Производство</a></li>
                <li><a href="{{ route('galleries') }}">Наше портфолио</a></li>
                <li><a href="{{ url('/page/materialy') }}">Материалы</a></li>
                <li><a href="{{ url('/page/nashi-kontakty') }}">Наши контакты</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('slides')

<section id="blocks">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="block block-callback">
                    <div><a href="#" onclick="return false" data-toggle="modal" data-target="#callbackModal">Обратный звонок</a></div>
                    <p>Мы Вам перезвоним</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="block block-calculate">
                    <div><a href="{{ route('calculation') }}">Онлайн расчет</a></div>
                    <p>Удобно и быстро</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="block block-measure">
                    <div><a href="{{ url('/page/zamer-i-dizayn') }}">Замер и Дизайн</a></div>
                    <p>Выезд бесплатно</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="block block-delivery">
                    <div><a href="{{ url('/page/dostavka') }}">Доставка</a></div>
                    <p>Ознакомиться с условиями</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="caption-1">Каталог</div>
                <div class="categories">
                    <div class="categories-top"></div>
                    <div class="categories-middle">
                        @include('partials._categories')
                    </div>
                    <div class="categories-bottom"></div>
                    {{--vkontakte--}}
                    <div id="vk_comments"></div>
                    <script type="text/javascript">
                        VK.Widgets.Comments("vk_comments", {limit: 10, width: "260", attach: "*"});
                    </script>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                @yield('content')
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="copyright"></div>
            <div class="social-buttons">
                <a href="https://www.facebook.com/profile.php?id=100012062166999" target="_blank"><img src="{{ asset('img/social-buttons/facebook.png') }}"></a>
                <a href="#" target="_blank"><img src="{{ asset('img/social-buttons/vkontakte.png') }}"></a>
                <a href="https://www.instagram.com/mebel_komforta/" target="_blank"><img src="{{ asset('img/social-buttons/instagram.png') }}"></a>
                <a href="https://ok.ru/profile/585653115696" target="_blank"><img src="{{ asset('img/social-buttons/odnoklassniki.png') }}"></a>
            </div>
        </div>
        <div class="row">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="{{ url('/page/o-kompanii') }}">О компании</a></li>
                <li><a href="{{ url('/page/kak-sdelat-zakaz') }}">Как сделать заказ</a></li>
                <li><a href="{{ route('catalog') }}">Каталог</a></li>
                <li><a href="{{ route('articles') }}">Статьи</a></li>
                <li><a href="{{ url('/page/proizvodstvo') }}">Производство</a></li>
                <li><a href="{{ route('galleries') }}">Наше портфолио</a></li>
                <li><a href="{{ url('/page/materialy') }}">Материалы</a></li>
                <li><a href="{{ url('/page/nashi-kontakty') }}">Наши контакты</a></li>
            </ul>
        </div>
    </div>
</footer>

@include('partials._request_design')
@include('partials._callback')
@include('partials._flash')

<script src="https://www.google.com/recaptcha/api.js?hl=ru&onload=myCallBack&render=explicit" async defer></script>
<script>
    var recaptchaFeedback;
    var recaptchaCallback;
    var recaptchaRequestDesign;

    var myCallBack = function() {
        if (document.getElementById('recaptchaFeedback')){
            recaptchaFeedback = grecaptcha.render('recaptchaFeedback', {'sitekey' : '{{ env('GOOGLE_RECAPTCHA_KEY') }}'});
        }

        if (document.getElementById('recaptchaCallback')){
            recaptchaCallback = grecaptcha.render('recaptchaCallback', {'sitekey' : '{{ env('GOOGLE_RECAPTCHA_KEY') }}'});
        }

        if (document.getElementById('recaptchaRequestDesign')){
            recaptchaRequestDesign = grecaptcha.render('recaptchaRequestDesign', {'sitekey' : '{{ env('GOOGLE_RECAPTCHA_KEY') }}'});
        }
    };
</script>

@yield('footer_scripts')
@include('partials._yandex_metrika_counter')
</body>
</html>