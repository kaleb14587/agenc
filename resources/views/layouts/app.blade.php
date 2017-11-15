<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/all/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/painel/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/font-awesome.css') }}" rel="stylesheet">
    @stack('css')
    @yield('style')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top collapse navbar-collapse" >
            <div class="container ">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ (  Auth::user() ? url('/home'): url('/')) }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{url('/home')}}" class="nav-link" href="#">home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"
                           id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Clientes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="    padding: 13px;">
                            <a class="dropdown-item" href="{{url('cliente/create')}}" style="width: 100%;float: left;">Novo cliente</a>
                            <a class="dropdown-item" href="{{route('tabela/clientes')}}" style="width: 100%;float: left;">Listar Clientes</a>
                        </div>
                    </li>
                    <!--li class="nav-item">
                        <a href="" class="nav-link" href="#">Novo Cliente</a>
                    </li-->
                    <li class="nav-item disabled">
                        <a href="produto/create" class="nav-link" href="#">Novo produto</a>
                    </li>
                </ul>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/all/js/util.module.js') }}"></script>
        @yield('script')
</body>
</html>
