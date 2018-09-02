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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand show-loader" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarColor02">
                <ul class="navbar-nav mr-auto nav-ong">
                    <li class="nav-item {{ Route::is('dashboard.*') ? 'active' : '' }}"><a href="{{ route('dashboard.index') }}" class="nav-link show-loader"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                    <li class="nav-item dropdown {{ Route::is('cadastros.*') ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-file-text"></i> Cadastros
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('cadastros.raca.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.raca.index') ? 'active' : '' }}">Raças</a>
                            <a href="{{ route('cadastros.especie.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.especie.index') ? 'active' : '' }}">Espécies</a>
                            <a href="{{ route('cadastros.animal.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.animal.index') ? 'active' : '' }}">Animais</a>
                            <a href="{{ route('cadastros.pessoa.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.pessoa.index') ? 'active' : '' }}">Pessoas</a>
                            <a href="{{ route('cadastros.lar-temporario.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.lar-temporario.index') ? 'active' : '' }}">Lar Temporário</a>
                            <a href="{{ route('cadastros.usuario.index') }}" class="dropdown-item show-loader {{ Route::is('cadastros.usuario.index') ? 'active' : '' }}">Usuário</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ Route::is('relatorios.*') ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-files-o"></i> Relatórios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('relatorios.animal.index') }}" class="dropdown-item show-loader {{ Route::is('relatorios.animal.*') ? 'active' : '' }}">Animais</a>
                            <a href="{{ route('relatorios.lar-temporario.index') }}" class="dropdown-item show-loader {{ Route::is('relatorios.lar-temporario.*') ? 'active' : '' }}">Lares Temporários</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ Route::is('site.*') ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-files-o"></i> Site
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('site.animal.index') }}" class="dropdown-item show-loader {{ Route::is('site.animal.*') ? 'active' : '' }}">Animais</a>
                            <a href="{{ route('site.moderacao-animal.index') }}" class="dropdown-item show-loader {{ Route::is('site.moderacao-animal.*') ? 'active' : '' }}">Moderação de Animais</a>
                            <a href="{{ route('site.denuncia.index') }}" class="dropdown-item show-loader {{ Route::is('site.denuncia.*') ? 'active' : '' }}">Denúncias</a>
                            <a href="{{ route('site.parceiro.index') }}" class="dropdown-item show-loader {{ Route::is('site.parceiro.*') ? 'active' : '' }}">Parceiros</a>
                            <a href="{{ route('site.sobre-nos.index') }}" class="dropdown-item show-loader {{ Route::is('site.sobre-nos.*') ? 'active' : '' }}">Sobre Nós</a>
                            <a href="{{ route('site.contato.index') }}" class="dropdown-item show-loader {{ Route::is('site.contato.*') ? 'active' : '' }}">Contato</a>
                            <a href="{{ route('site.colaboracao.index') }}" class="dropdown-item show-loader {{ Route::is('site.colaboracao.*') ? 'active' : '' }}">Colaboração</a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav pull-rigth nav-ong">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->nome }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
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
