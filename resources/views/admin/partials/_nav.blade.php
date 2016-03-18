<div class="container-fluid">
    <div class="row">
        <nav class="teal">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ url('/admin') }}" class="brand-logo">Мебель комфорта</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="dropdown-button" href="#" data-activates="user-dropdown"><i class="material-icons left">account_circle</i> {{ Auth::user()->name }}</a></li>
                        <li><a href="#"><i class="material-icons left">settings</i> Настройки</a></li>
                    </ul>
                    <ul id="user-dropdown" class="dropdown-content">
                        <li><a href="#"><i class="fa fa-file-text"></i> Профиль</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i> Выход</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>