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
    <link href="{{ asset('css/eschas.css') }}" rel="stylesheet">

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

        <nav class="flex-row sp-be">
            <div class="nav-flex-1 flex-row sp-ev">
                    <div class="search">
                        <form class="searchform" action="{{url('/searchresults')}}" method="POST">
                            @csrf
                            <div class="search-input-field">
                                <input id="search-input"  style="width: 200px !important; border-radius: 10px; padding: 3px; border: none;  "name="movieName" type="text" placeholder="Search" required>
                                <button class="item1" type="submit" name="action">
                                    <i class="fas fa-search"></i>
                                </button>
                                &nbsp;
                            </div>
                        </form>
                    </div>
                    <div class="search">
                        <form class="searchform" action="{{url('/searchresultsgenre')}}" method="POST">
                            @csrf
                            <div class="search-input-field style-selected">
                                <select id="search-input" name="movieGenre" placeholder="See Movies By Genre" required>
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
                        </form>
                    </div>
                </div>

                <div class="nav-flex-2">
                    <div class="title-logo">
                        {{-- <img src="{{ asset('images/cineoWhite.png') }}">  --}}
                        <a href="/">
                            <h1 style="color:#ffffff;">cineo</h1>
                        </a>
                    </div>
                </div>

                <div class="nav-flex-3 flex-col sp-ar">
                    <div class="inline flex-row">

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

        <footer class="flex-row">
            <div class="box flex-col">
                <div>
                @guest
                        <button class="item1"><a class="soi-footer" href="{{ route('login') }}">Login</a></button>
                        {{-- @if (Route::has('register')) --}}
                        <button class="item1"><a class="soi-footer" href="{{ route('register') }}">&nbsp;Register</a></button>
                        {{-- @endif --}}
                    @else
                        
                    <a class="" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();
                        ">
                        &nbsp;Logout
                    </a>
                        
                    <a class="soi-footer" href="/profile">
                    &nbsp;   <span><i class="fas fa-user"></i>&nbsp;<b>{{ Auth::user()->name }}</b></span>
                    </a>
                    
                    <button class="item1">
                        {{-- <span><i class="fas fa-user"></i>&nbsp;<b>{{ Auth::user()->name }}</b></span> Dashboard on click --}}
                    </button>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                </div>
                    
                <a href="/">
                    <p>The cineo Group</p>
                </a>
                <a href="/">
                    <p>Contact</p>
                </a>
                <a href="/">
                    <p>Support</p>
                </a>
                <a href="/">
                    <p>About us</p>
                </a>
            </div>
        
            <div class="box flex-col">
                <div class="box-line flex-row">
                    <a href="/">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="/">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="/">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                </div>
                <div style="height:10px;">
                </div>
                <p>Nowhere</p>
                <p>23728 NW</p>
                <p>NWAS</p>
            </div>              
        </footer>
        
    </div>

</body>
</html>
