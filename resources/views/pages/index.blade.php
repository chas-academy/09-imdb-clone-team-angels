@extends('layouts.app')

@section('content')

<header id="back" class="flex-col sp-ar overlay">
    <a href="#top5">
        <h1>Top 5 Movies</h1>
    </a>
</header>



@if(isset($popular) && count($popular) > 0)
<div id="top5" class="top-5-container ">

    @foreach($popular as $value)
        @if($loop->index < 5)
        @if(isset($value['poster_path']))
            <a href='{{ url('details/' . $value['id']) }}'>
                <div class="container-background mov1" style="background: url('https://image.tmdb.org/t/p/w1280/{{$value['backdrop_path']}}'); background-repeat: no-repeat; background-size: cover;">
               
                    <div class="desc-top"
                        @if(isset($value['title']))
                           <h1> {{ $value['title'] }}</h1>
                        @endif

                        @if(strlen($value['release_date']) > 1)
                            <p style="text-align:right; width: auto;" class="result-release">
                                {{substr($value['release_date'], 0 ,-6)}}
                            </p>
                        @endif

                        @if(isset($value['overview']))
                            <p>{{ $value['overview'] }}</p>
                        @endif
                    </div>
               
                </div>
            </a> 
         @endif
          


            {{--

                            @if(isset($value['title']))
                                <h2>{{$value['title']}}</h2>
                            @endif

                            @if(strlen($value['release_date']) > 1)
                                <p class="result-release">
                                    {{substr($value['release_date'], 0 ,-6)}}
                                </p>
                            @endif

                        @if(isset($value['overview']))
                            <p>{{ $value['overview'] }}</p>
                        @endif


                 --}}
            @endif
            @endforeach
    
    </div>
    @endif










    <div class="s-results-container none">
        @if(isset($trending) && count($trending) > 0)
            <div class="search-results-container">
                <div class="search-results-content">
                        <h3 style="text-align: left; width: 1080px;margin: auto;">Hottest now</h3>
                    <div class="search-results new">
                       
                    @foreach(array_reverse($trending) as $value)
                        <!-- @if($loop->index < 5) -->

                        <div class="search-result-item">
                            {{-- <a href='https://www.themoviedb.org/movie/{{$value['id']}}'> --}}
                            <a href='{{ url('details/' . $value['id']) }}'>

                                @if(isset($value['poster_path']))
                                    {{--<img src='https://image.tmdb.org/t/p/w1280/{{$value['poster_path']}}'/>--}}
                                    <div class="search-r-image" style="background: url('https://image.tmdb.org/t/p/w1280/{{$value['poster_path']}}'); height: 300px; width: 200px; background-size: cover;">

                                        @if(isset($value['overview']))
                                        <p> <span style="font-weight: bold; font-size: 18px;"> {{$value['title']}} </span><br/><br/>{{ $value['overview'] }}</p>
                                        @endif
                                    </div>
                                @else
                                    <img src='{{ asset('images/movPlaceholder.png') }}' style='height: 300px;'/>
                                @endif

                                <p class="result-title">
                                    {{$value['title']}}
                                </p>

                                @if(strlen($value['release_date']) > 1)
                                    <p class="result-release">
                                        {{substr($value['release_date'], 0 ,-6)}}
                                    </p>
                                @endif

                            </a>
                        </div>

                        <!-- @endif -->

                    @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

        @if(isset($error_msg))
            <h3>
                {{$error_msg}}
            </h3>
        @endif

</div>

@endsection