<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
</head>
<body >

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm" >
            <div class="container">
                <img style="width: 50px" src="{{ asset('images/chat.png') }}" alt="logo">
  
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                           
                        @else
                            
                            <li class="nav-item ">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ auth()->user()->name }}
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="dropdownMenuButton">
                                        <a class="btn dropdown-item" href="{{ route('home') }}">
                                            Chat
                                        </a> 
                                        <a class="btn dropdown-item" href="{{ route('profile.index') }}">
                                            Editar perfil
                                        </a> 
                                        <button class="btn dropdown-item" v-on:click="logout">
                                               Cerrar Sesión 
                                        </button> 
                                    </div>
                                  </div>
                            </li>
                        @endguest
                    </ul>
             
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
