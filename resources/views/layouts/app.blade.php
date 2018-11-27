<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="domain" content="{{ config('app.url') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #f8f8f8">
<div id="toast"></div>
<div id="loadPanelContainer"></div>
<div id="app">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand show-loader" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{ Route::is('dashboard.*') ? 'active' : '' }}"><a href="{{ route('dashboard.index') }}" class="show-loader"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                    <li class="dropdown {{ Route::is('cadastros.*') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text"></i> Cadastros <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('cadastros.raca.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.raca.index') ? 'active' : '' }}">Raças</a></li>
                            <li><a href="{{ route('cadastros.especie.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.especie.index') ? 'active' : '' }}">Espécies</a></li>
                            <li><a href="{{ route('cadastros.animal.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.animal.index') ? 'active' : '' }}">Animais</a></li>
                            <li><a href="{{ route('cadastros.pessoa.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.pessoa.index') ? 'active' : '' }}">Pessoas</a></li>
                            <li><a href="{{ route('cadastros.lar-temporario.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.lar-temporario.index') ? 'active' : '' }}">Lar Temporário</a></li>
                            <li><a href="{{ route('cadastros.usuario.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.usuario.index') ? 'active' : '' }}">Usuário</a></li>
                        </ul>
                    </li>

                    <li class="dropdown {{ Route::is('relatorios.*') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-files-o"></i> Relatórios <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('relatorios.animal.index') }}" class="dropdown-item show-loader {{ Route::is('relatorios.animal.*') ? 'active' : '' }}">Animais</a></li>
                            <li><a href="{{ route('relatorios.lar-temporario.index') }}" class="dropdown-item show-loader {{ Route::is('relatorios.lar-temporario.*') ? 'active' : '' }}">Lares Temporários</a></li>
                        </ul>
                    </li>
                    {{--<li class="nav-item dropdown {{ Route::is('site.*') ? 'active' : '' }}">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
                            {{--<i class="fa fa-files-o"></i> Site <span class="caret"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="{{ route('site.animal.index') }}" class="dropdown-item show-loader {{ Route::is('site.animal.*') ? 'active' : '' }}">Animais</a></li>--}}
                            {{--<li><a href="{{ route('site.moderacao-animal.index') }}" class="dropdown-item show-loader {{ Route::is('site.moderacao-animal.*') ? 'active' : '' }}">Moderação de Animais</a></li>--}}
                            {{--<li><a href="{{ route('site.denuncia.index') }}" class="dropdown-item show-loader {{ Route::is('site.denuncia.*') ? 'active' : '' }}">Denúncias</a></li>--}}
                            {{--<li><a href="{{ route('site.parceiro.index') }}" class="dropdown-item show-loader {{ Route::is('site.parceiro.*') ? 'active' : '' }}">Parceiros</a></li>--}}
                            {{--<li><a href="{{ route('site.sobre-nos.index') }}" class="dropdown-item show-loader {{ Route::is('site.sobre-nos.*') ? 'active' : '' }}">Sobre Nós</a></li>--}}
                            {{--<li><a href="{{ route('site.contato.index') }}" class="dropdown-item show-loader {{ Route::is('site.contato.*') ? 'active' : '' }}">Contato</a></li>--}}
                            {{--<li><a href="{{ route('site.colaboracao.index') }}" class="dropdown-item show-loader {{ Route::is('site.colaboracao.*') ? 'active' : '' }}">Colaboração</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->nome }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

@yield('modals')

<form action="" method="post" id="delete-form">
    {!! method_field('delete') !!} {!! csrf_field() !!}
</form>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
