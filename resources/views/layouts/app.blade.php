<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cineo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/movieDetail.css') }}" rel="stylesheet">

    <!-- Compiled and minified Materialize CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

    <!-- Compiled and minified Materialize JavaScript -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script>
        // TODO remove me
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, {});
        });
    </script>

</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Cineo') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        </nav> --}}

    <nav>
        <div class="nav-flex-1">
            <div>
                <i class="fas fa-bars"></i>
            </div>
        </div>

        <div class="nav-flex-2">
            <div class="title-logo">
                <!-- <img src="{{ asset('images/cineoWhite.png') }}"> -->
                <a href="/"><h1 style="color:white">cineo</h1></a>
            </div>
        </div>

        <div class="nav-flex-3">
            <div class="inline">

               <div class="search">
                    <form class="searchform" action="{{url('/searchresults')}}" method="POST">
                        @csrf
                        <div class="search-input-field">
                            <input id="search-input" name="movieName" type="text" placeholder="Search">
                            <button class="item1" type="submit" name="action">
                                <i class="fas fa-search"></i>
                            </button>
                            &nbsp;
                        </div>
                        <!-- <div class="row"></div> -->
                    </form>
                </div>

                {{--<div class="search">
                    <form class="searchform" action="{{url('/searchresults')}}" method="POST">
                        @csrf
                        <div class="search-input-field">
                            <input id="search-input" name="movieName2" type="text" placeholder="Search">
                            <button class="item1" type="submit" name="action">
                                <i class="fas fa-search"></i>
                            </button>
                            &nbsp;
                        </div>
                        <!-- <div class="row"></div> -->
                    </form>
                </div>--}}

                <div class="search">
                    <form class="searchform" action="{{url('/searchresultsgenre')}}" method="POST">
                        @csrf
                        <div class="search-input-field style-selected">
                            <select id="search-input" name="movieGenre" placeholder="See Movies By Genre">
                            <option value="" disabled selected>Movies By Genre</option> 
                                <option value="28">Action</option>
                                <option value="12">Adventure</option>
                                <option value="16">Animation</option>
                                <option value="35">Comedy</option>
                                <option value="80">Crime</option>
                                <option value="99">Documentary</option>
                                <option value="18">Drama</option>
                                <option value="10751">Family</option>
                                <option value="14">Fantasy</option>
                                <option value="36">History</option>
                                <option value="27">Horror</option>
                                <option value="9640">Mystery</option>
                                <option value="878">Science Fiction</option>
                                <option value="10752">War</option>
                                <option value="37">Western</option>
                            </select>
                            <button class="item1" type="submit" name="action">
                                <i class="fas fa-search"></i>
                            </button>
                            &nbsp;
                        </div>
                        <!-- <div class="row"></div> -->
                    </form>
                </div>




                <div class="s-up-in">
                    @guest
                      <button class="item1"><a class="lo-inout" href="{{ route('login') }}">Login</a></button>
                      {{-- @if (Route::has('register')) --}}
                      <button class="item1"><a class="lo-inout" href="{{ route('register') }}">Register</a></button>
                      {{-- @endif --}}
                    @else
                     
                            <a class="lo-inout" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();
                                ">
                                &nbsp;Logout
                            </a>
                      
                            <a class="lo-inout" href="/profile">
                            &nbsp; Profile
                            </a>
                    

                        <button class="item1">
                            <span><i class="fas fa-user"></i>&nbsp;<b>{{ Auth::user()->name }}</b></span> {{-- Dashboard on click --}}
                        </button>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                
                </div>
            </div>
        </div>


        </div>
     </nav>

        <main>
            <div class="row">
                    @yield('content')
                
            </div>
        </main>
    </div>
</body>
</html>
