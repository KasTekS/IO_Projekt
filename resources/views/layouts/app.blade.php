<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StarKino') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/film.css') }}" rel="stylesheet">
    <link href="{{ asset('css/podsumowanie.css') }}" rel="stylesheet">


</head>
<body>

    <div id="app" >
        <div style="min-height: calc(100vh - 55px)">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">StarKino</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">...</span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('repertuar')}}">Repertuar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('cennik')}}">Cennik</a>
              </li>
                @can('isAdmin')
               <li class="nav-item">
                <a class="nav-link" style="color: #1dff00 " href="{{route('seans')}}">Seanse </a>
              </li>
               <li class="nav-item">
                <a class="nav-link" style="color: #1dff00" href="{{route('ceenikedit')}}">Cennik</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" style="color: #1dff00" href="{{route('film')}}">Filmy</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" style="color: #1dff00" href="{{route('sala')}}">Sale</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" style="color: #1dff00" href="{{route('bilety')}}">Bilety</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" style="color: #1dff00" href="{{route('userlist')}}">Lista użytkowników</a>
              </li>
            @endcan
            </ul>


            <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->imie }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('bilety.show') }}">Twoje bilety</a>
                                    <a class="dropdown-item" href="{{ route('user.edit') }}">Edytuj profil</a>

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

          </div>
        </div>
      </nav>


        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">

                    </ul>


                    <ul class="navbar-nav ms-auto">

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                </div>
            </div>
        </nav> -->

        <main class="py-4">
            @yield('content')
        </main>
{{--   --}}

    </div>
    <footer class="bg-light text-center">
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                  © StarKino – 2022
                </div>
              </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/film.js') }}"></script>
    <script type="text/javascript">
    @yield('javascript')
    </script>
    @yield('js-file')
</body>
</html>
