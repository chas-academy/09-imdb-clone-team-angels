@extends('layouts.app')

@section('content')

<div class="card grey lighten-4">
    <div class="card-content">
        {{-- @php
            dd($data);
        @endphp --}}
        
        @if(isset($data) && count($data) > 0)
            <ul class="collection">
                @foreach($data as $value)
                    <li class="collection-item">
                        {{-- <a href='https://www.themoviedb.org/movie/{{$value['id']}}'> --}}
                        <a href='{{ url('details/' . $value['id']) }}'>
                            
                            <span class="title">
                                <h5>
                                    {{$value['title']}} 
                                    @if(strlen($value['release_date']) > 1)
                                        <i>({{$value['release_date']}})</i>
                                    @endif
                                </h5>
                            </span>
                            @if(isset($value['poster_path']))
                                <img src='https://image.tmdb.org/t/p/w1280/{{$value['poster_path']}}' style='height: 180px;'/>
                            @else
                                <img src='{{ asset('images/posterPlaceholder.png') }}' style='height: 180px;'/>
                            @endif
                            
                        </a>
                    </li>
                @endforeach
            </ul>
        @elseif(isset($error_msg))
            <h3>
                {{$error_msg}}
            </h3>
        @endif
        
    </div>
</div>
    
@endsection