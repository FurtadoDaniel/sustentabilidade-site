<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sustentabilidade</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    
        .card-deck {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(275px, 1fr));
            grid-gap: .5rem;
        }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sustentabilidade
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navDropdown">
                                <a class="dropdown-item" href="/abaixo-assinados">Abaixo Assinados</a>
                                <a class="dropdown-item" href="/especies/animal">Animais</a>
                                <a class="dropdown-item" href="/especies">Espécies</a>
                                <a class="dropdown-item" href="/eventos">Eventos</a>
                                <a class="dropdown-item" href="/produtos">Loja</a>
                                <a class="dropdown-item" href="/especies/planta">Plantas</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline" action="{{ route('search') }}">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (session()->has('carrinho'))
                                        <a class="dropdown-item" href="{{ route('add_car') }}">
                                        {{ __('Carrinho') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer text-center">
            <div class="container">
                <div class="row">

                    <!-- Footer Location -->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Contatos</h4>
                        <p class="lead mb-0">contato@contato.com.br</p>
                    </div>

                    <!-- Footer Social Icons -->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Patrocinadores</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#">
                            <img src="http://www.uff.br/sites/default/files/imagens-das-paginas/logo-uff-branco-site_0.png" alt="Smiley face">
                        </a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#">
                            <img src="http://www.ic.uff.br/~simone/orgcomp/Ic_uff.jpg" alt="Smiley face">
                        </a>
                    </div>

                </div>
            </div>
        </footer>
    </div>
</body>
</html>
