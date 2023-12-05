<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/starter-template.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- <script>
 $(document).ready(function(){
alert('Ваша версия jQuery ' + jQuery.fn.jquery);
});
</script> --}}

</head>

<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;"">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">{{ __('main.Online_Shop') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('main.All_goods')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('main.Basket')}}</a>
                    </li>
                    <li class="nav-item dropdown ms-auto my-auto">

                        <form action="{{ route('locale_change') }}" method="post">
                            @csrf
                            <select name="locale_change" onchange="submit()">
                               <option value="ua" @localeactive("ua")>ua</option>
                                <option value="ru" @localeactive("ru")>ru</option>
                            </select>
                        </form>
                    </li>
                    <li class="nav-item px-4 ms-auto">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                            <button class="btn btn-outline-success" type="submit">Поиск</button>
                        </form>
                    </li>
                    <li class="nav-item px-4 ms-auto">
                        @guest
                            <a class="btn btn-outline-success" href="{{ route('login') }}">Войти</a>
                        @endguest

                        @auth
                            @admin
                            <li><a href="{{ route('home') }}">Панель администратора</a></li>
                        @endadmin
                        <li><a href="#">{{ Auth::user()->name }}</a></li>
                        <li><a href="{{ route('get-logout') }}">Выйти</a></li>
                    @endauth
                    </li>


                </ul>
            </div>
        </div>
    </nav>
</div>

    <br>
    <div class="container">
        <div class="starter-template">
            @yield('content')
        </div>
    </div>
</body>

</html>
