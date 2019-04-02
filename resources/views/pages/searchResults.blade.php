@extends('layouts.app')

@section('content')



<div class="page-content">


    <div class="s-results-container">     
        @if(isset($data) && count($data) > 0)
            <div class="search-results-container">
                <div class="search-results-content">
                @if(isset($searchTerm))
                        <div style="color: white; text-align: start; float: left; font-size: 30px;" class="result-title">
                            {{ $searchTerm }}
                        </div>
                    @endif
                    <div class="search-results">


                  

                 
                    @foreach($data as $value)

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
        @endforeach
                </div>
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