<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        .nnav {
            color: red;
        }

        #nav{
            height:100px;
        }
    </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="../../css/styles.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            <nav class="nnav navbar navbar-expand-lg navbar-light bg-info height " id="nav">
                    <div class="container ml-5">
                            <div class="collapse navbar-collapse auto" id="navbarScroll">
                                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll justify-evenly" style="--bs-scroll-height:100px">
                                    <li class="nav-item">
                                        {{-- <a class="nav-link active mr-5" aria-current="page">Accueil</a> --}}
                                        <router-link to="/" class="nav-link active mr-5"> Accueil </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/magazin" class="nav-link active mr-5"> Magazin </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/dash" class="nav-link active mr-5"> Dahsboard </router-link>
                                    </li>
                                </ul>
                            </div> 
                    </div>
                    <div class="container">
                        <a class="navbar-brand text-red-500" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div class="container">
                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll justify-evenly" style="--bs-scroll-height: 100px;">
                                <router-link to="/Cart" class="nav-link active mr-5"> <img src="shopping_bag.svg" class="mr-5" alt="">
                                    <span v-text="this.$store.state.cart.produits.length" class="rounded-full px-1 ml-3 bg-black text-white rounded"></span> 
                                </router-link>
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connecté') }}</a>
                                            </li>
                                        @endif
            
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </ul>
                    </div>
                </nav>     

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
