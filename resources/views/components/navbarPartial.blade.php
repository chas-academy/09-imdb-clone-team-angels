<head>
    <link href="{{ asset('css/navbar.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</head>
    
<nav>
    <div class="logo-section">
        <a class="logo" href="/home">
            <b>Cineo</b>
        </a>
        <button class="hb-button"><i class="fa fa-bars"></i></button>
    </div>
    <ul>
        @can('browse_admin')
        <li><a href="/admin"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
        <li><a href="/reviews/pending"><i class="fas fa-pen-square"></i>&nbsp;Pending Reviews</a></li>
        @endcan
        @auth
        <li><a href="/profile"><i class="fas fa-user-alt"></i>&nbsp;{{Auth::user()->name}}</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endauth
        @guest
        <li><a href="{{ route('register') }}"><i class="fas fa-sign"></i>&nbsp;Register</a></li>
        <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></li>
        @endguest
        <li><a href="/home"><i class="fas fa-home"></i>&nbsp;Home</a></li>
        <li>
            <form action="{{url('/searchresultsgenre')}}" method="POST">
                @csrf
                <select name="movieGenre" onchange="this.form.submit()" required>
                    <option value="" disabled selected>Movies by Genre&nbsp;▾&nbsp;</option> 
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
            </form>
        </li>
        <li>
            <form action="{{url('/searchresults')}}" method="POST">
                @csrf
                <input list="genres" name="movieName" type="text" placeholder="Search" autofocus required/>
            </form>
        </li>
    </ul>
</nav>

<script type="text/javascript">
    $(document).ready(function(){
        $('.hb-button').on('click', function(){
            $('nav ul').toggleClass('show')
        })
    })
</script>