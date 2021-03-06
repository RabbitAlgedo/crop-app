<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

    <title>{{ config('app.name', 'Laravel') }} | Торговля Зерном</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <link rel="icon" href="/logo.svg" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="manifest" href="/manifest.webmanifest">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
          rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div id="app" >
        <nav class="main-menu navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logotype" src="/logo.svg" alt="crop logotype">{{ config('app.name', 'Laravel') }}
                </a>

                <div class="navbar" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto main-menu-list">
                        <div class="btn-group">
                            <button type="button" class="btn btn-main link-add-culture btn-rounded d-none d-md-block">
                                <a href="/culture/create" class="btn-link" role="button">Добавити пропозицію</a>
                            </button>
                            <button type="button" class="btn btn-main link-add-culture btn-rounded d-block d-md-none">
                                <a href="/culture/create" class="btn-link" role="button"><span class="material-icons-outlined">add</span></a>
                            </button>
{{--                            <button type="button" class="btn btn-main dropdown-toggle dropdown-toggle-split" id="show_proposal" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                <span class="visually-hidden">Продам/Куплю</span>--}}
{{--                            </button>--}}
{{--                            <ul class="dropdown-menu w dropdown-menu-end" aria-labelledby="show_proposal">--}}
{{--                                <li><a class="dropdown-item dropdown-item-with-icon" href="/culture/create">--}}
{{--                                        <span class="material-icons-outlined">sell</span>--}}
{{--                                        <span>Продам культуру</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li><a class="dropdown-item dropdown-item-with-icon" href="/culture/create">--}}
{{--                                        <span class="material-icons-outlined">local_mall</span>--}}
{{--                                        <span>Куплю культуру</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </div>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <button class="btn btn-primary">Приєднатися</button>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <button type="button" class="btn btn-main btn-rounded link-add-culture d-none d-md-block">
                                    <a href="{{ route('sklads') }}" class="btn-link" role="button">Внесення локації</a>
                                </button>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-main link-add-culture d-none d-md-block">
                                        <a href="{{ route('cabinet') }}" class="btn-link" role="button">Особистий кабінет</a>
                                    </button>
                                    <button type="button" class="btn btn-main link-add-culture d-block d-md-none">
                                        <a href="/culture/create" class="btn-link" role="button">
                                            <span class="material-icons-outlined">account_circle</span>
                                        </a>
                                    </button>
                                    <button type="button" class="btn btn-main dropdown-toggle dropdown-toggle-split" id="show_personal" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Особистий кабінет</span>
                                    </button>
                                    <ul class="dropdown-menu w dropdown-menu-end" aria-labelledby="show_personal">
                                        <li><a class="dropdown-item dropdown-item-with-icon" href="/settings">
                                                <span class="material-icons-outlined">manage_accounts</span>
                                                <span>Налаштування</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a><hr class="dropdown-divider"></a>
                                            <a class="dropdown-item dropdown-item-with-icon" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <span class="material-icons-outlined">logout</span>
                                                <span>Вийти</span>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="{{ route('notifications') }}" role="button">
                                    <span class="material-icons-outlined md-36">notifications</span>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @guest
            <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                Увага! Ви не авторизовані, деякі функції для вас вимкнено
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endguest
        <main class="my-5">
            @yield('content')
        </main>

        @include('footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript">
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
</body>
</html>
