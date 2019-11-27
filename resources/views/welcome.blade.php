<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sustentabilidade</title>
        <script type="text/javascript" src="/js/lib/dummy.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="css/freelancer.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/result-light.css">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style id="compiled-css" type="text/css">

        </style>


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
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

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Sustentabilidade
                </div>

                <div class="links">
                    <a href="/abaixo-assinados">Abaixo Assinados</a>
                    <a href="/especies/animal">Animais</a>
                    <a href="/produtos">Loja</a>
                    <a href="/especies">Espécies</a>
                    <a href="/eventos">Eventos</a>
                    <a href="/especies/planta">Plantas</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-md-12">

                    <!-- Page Heading -->
                    <h1 class="my-4">Notícias
                    </h1>
                    @if(isset($noticias))
                    @foreach($noticias as $noticia)
                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{ $noticia->titulo }}</h3>
                            <p>{{ $noticia->conteudo }}</p>
                        </div>
                    </div>

                                <hr>
                    <!-- /.row -->
                    @endforeach
                    @endif

                </div>
                <div class="col-md-12">


                    <!-- Page Heading -->
                    <h1 class="my-4">Videos
                    </h1>
                    @if(isset($videos))
                    @foreach($videos as $video)
                        <div class="row">
                            <div class="col-md-12">
                                <h3>{{$video['titulo']}}</h3>
                                <iframe width="420" height="315"
                                        src="{{$video['url']}}">
                                </iframe>
                            </div>
                        </div>

                        <hr>
                        <!-- /.row -->
                    @endforeach
                    @endif

                </div>
                <div class="col-md-12">


                    <!-- Page Heading -->
                    <h1 class="my-4">Eventos
                    </h1>
                    @if (isset($eventos))
                    @foreach($eventos as $evento)
                        <div class="row">
                            <div class="col-md-12">
                                <h3>{{$evento->titulo}}</h3>
                                <small class="text-muted"><em>
                                    {{ $evento->inicio }}
                                    @if(filled($evento->fim))
                                        até {{ $evento->fim }}
                                    @endif
                                </em></small>
                                <p>{{$evento['descricao']}}</p>
                            </div>
                        </div>

                        <hr>
                        <!-- /.row -->
                    @endforeach
                    @endif

                </div>
                <div class="col-md-12">


                    <!-- Page Heading -->
                    <h1 class="my-4">Depoimentos
                    </h1>
                    @if(isset($depoimentos))
                    @foreach($depoimentos as $depoimento)
                        <blockquote class="blockquote">
                            <h4>{{ $depoimento->titulo }}</h4>
                            <p class="mb-0">{{$depoimento->conteudo}}</p>
                            <footer class="blockquote-footer text-right">{{ $depoimento->user->name }}</footer>
                        </blockquote>

                        <hr>
                        <!-- /.row -->
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
        <!-- /.container -->
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
    </body>
</html>
