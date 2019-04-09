@extends('layouts.app')

@section('content')

<head>
    <link href="{{ asset('css/index.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<header class="flex-col sp-ar">
    <a href="#top5">
        <h1>Top 5 Movies</h1>
    </a>
</header>

@if(isset($popular) && count($popular) > 0)
    <div id="top5">
        @foreach($popular as $value)
            @if($loop->index < 5)
            @if(isset($value['poster_path']))
                <a href='{{ url('details/' . $value['id']) }}'>
                    <div class="top-5-container flex-row" style="background: url('https://image.tmdb.org/t/p/original/{{$value['backdrop_path']}}'); background-repeat: no-repeat; background-size: cover; box-shadow:inset 0 0 15px #000000;">
                        <div class="top-5-num flex-col">
                            <h1>{{$loop->index + 1}}</h1>
                        </div>
                        <div class="top-5-desc flex-col sp-ce">
                            @if(isset($value['title']))
                                <h1>{{ $value['title'] }}</h1>
                            @endif
                            @if(strlen($value['release_date']) > 1)
                                <p class="top-5-release">
                                    {{substr($value['release_date'], 0 ,-6)}}
                                </p>
                            @endif
                            @if(isset($value['overview']))
                                <p class="top-5-overview">{{ $value['overview'] }}</p>
                            @endif
                        </div>
                    </div>
                </a> 
            @endif
            @endif
        @endforeach
    </div>
@endif



@if(isset($trending) && count($trending) > 0)
    <div style="display: flex; justify-content: center; flex-flow: column; overflow-x: hidden; width: 100vw; padding: 40px 0 40px 0;">
        <h3 style="text-align: left; margin: 0 auto 0 auto; width:80vw; padding-bottom: 3px;">Hottest now</h3>
        <div style="width: 80vw;display: flex;justify-content: space-between;flex-flow: row nowrap;overflow-x: scroll;margin: 0 auto 0 auto;">
            @foreach(array_reverse($trending) as $value)
                @if($loop->index < 5)
                {{-- Item --}}
                    <div style="margin-right: 20px">
                        <a href='{{ url('details/' . $value['id']) }}'>
                            @if(isset($value['poster_path']))
                                <div class="search-r-image" style="background: url('https://image.tmdb.org/t/p/w1280/{{$value['poster_path']}}'); height: 300px; width: 200px; background-size: cover;">
                                    @if(isset($value['overview']))
                                        <p>
                                            <span style="font-weight: bold; font-size: 18px;">
                                                {{$value['title']}}
                                            </span>
                                            <br/>
                                            <br/>
                                            {{ $value['overview'] }}
                                        </p>
                                    @endif
                                </div>
                            @else
                                <img src='{{ asset('images/movPlaceholder.png') }}' style='height: 300px;'/>
                            @endif
                            <p class="result-title" style="color: black; max-width: 200px; text-align:center; padding-top: 4px;">
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
@endif


{{-- @if(isset($error_msg))
    <h3>
        {{$error_msg}}
    </h3>
@endif
</div> --}}
@endsection