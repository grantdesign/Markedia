<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/front/images/version/market-logo.png') }}" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Главная</a>
                    </li>

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.create') }}">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.create') }}">Авторизация</a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">Профиль</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Выход</a>
                    </li>
                    @endauth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                    </li>
                </ul>
                <form class="form-inline" method="get" action="{{ route('search') }}">
                    <input class="form-control mr-sm-2 @error('s') is-invalid @enderror" type="text" name="s" placeholder="How may I help?" required="">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>

                <style>
                    .market-header .form-inline .form-control.is-invalid {
                        border: 2px solid red;
                    }
                </style>

            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->