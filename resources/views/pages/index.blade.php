@extends('layouts.app')

@section('content')
  
    <header id="back" class="overlay">

    
    <a href="#top5">
    <h1>Top 5 Movies</h1>
    </a>
    </header>
                

<div class="page-content">

    <div class="s-results-container">     
        @if(isset($popular) && count($popular) > 0)
            <div class="search-results-container">
                <div class="search-results-content">
                    <div class="search-results">
                    @foreach($popular as $value)
                        @if($loop->index < 5)
                    
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

                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>







    <div class="s-results-container">     
        @if(isset($trending) && count($trending) > 0)
            <div class="search-results-container">
                <div class="search-results-content">
                    <div class="search-results">
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