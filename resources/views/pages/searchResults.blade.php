@extends('layouts.app')

@section('content')


<head>
    <link href="{{ asset('css/searchResults.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
</head>


<div class="s-results-container">      
    @if(isset($data) && count($data) > 0)

        <div class="search-results-container">

            @if(isset($searchTerm))
                <div class="search-title">
                    {{ $searchTerm }}
                </div>
            @endif
            <div class="search-results-content">
                <div class="search-results flex-row sp-ce">
                @foreach($data as $value)
                <div class="search-result-item">
                    <a href='{{ url('details/' . $value['id']) }}'>
                        @if(isset($value['poster_path']))
                            <div class="search-r-image" style="background: url('https://image.tmdb.org/t/p/w1280/{{$value['poster_path']}}'); height: 300px; width: 200px; background-size: cover;">
                                @if(isset($value['overview']))
                                    <p> <span style="font-weight: bold; font-size: 18px;"> {{$value['title']}} </span><br/><br/>{{ $value['overview'] }}</p>
                                @endif
                            </div>
                        @else
                            <img src='{{ asset('images/movPlaceholder.png') }}' style='height: 300px;'/>
                        @endif
                        <p class="search-r-title">
                            {{$value['title']}} 
                        </p>
                        @if(strlen($value['release_date']) > 1)
                            <p class="search-r-release">
                                {{substr($value['release_date'], 0 ,-6)}}
                            </p>
                        @endif
                    </a>
                </div>  
                @endforeach
                </div>
            </div>
        </div>


    @elseif(isset($error_msg))

        <h3>
            {{$error_msg}}
        </h3>

    @endif
</div>    
@endsection