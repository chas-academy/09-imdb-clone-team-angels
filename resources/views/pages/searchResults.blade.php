@extends('layouts.app')

@section('content')

<div class="card grey lighten-4">
    <div class="card-content">
        {{-- @php
            dd($data);
        @endphp --}}
        
        @if(isset($data) && count($data) > 0)
            <div class="search-results-container">
                <div class="search-results-content">
                    <div class="search-results">
                    @foreach($data as $value)
                    
                    <div class="search-result-item">
                        {{-- <a href='https://www.themoviedb.org/movie/{{$value['id']}}'> --}}
                        <a href='{{ url('details/' . $value['id']) }}'>
                            
                            @if(isset($value['poster_path']))
                                <img src='https://image.tmdb.org/t/p/w1280/{{$value['poster_path']}}' style='height: 180px;'/>
                            @else
                                <img src='{{ asset('images/posterPlaceholder.png') }}' style='height: 180px;'/>
                            @endif
                
                            <p class="result-title">
                                {{$value['title']}} 
                            </p>
                             
                            @if(strlen($value['release_date']) > 1)
                                <p class="result-release">{{$value['release_date']}}</p>
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
</div>
    
@endsection