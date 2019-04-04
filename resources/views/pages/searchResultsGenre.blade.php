@extends('layouts.app')

@section('content')






    <div class="s-genre-container">     
        @if(isset($data) && count($data) > 0)
            <div class="genre-results-container">

                    {{-- @if(isset($searchGenre) && $searchGenre == 16 )
                    <div class="result-title search-title">
                       
                        Animation
                    </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 28 )
                <div class="result-title search-title">
                   
                    Action
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 12 )
                <div class="result-title search-title">
                   
                   Adventure
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 35 )
                <div class="result-title search-title">
                   
                    Animation
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 80 )
                <div class="result-title search-title">
                   
                    Crime
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 99 )
                <div class="result-title search-title">
                   
                    Documentary
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 18 )
                <div class="result-title search-title">
                   
                    Drama
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 10751 )
                <div class="result-title search-title">
                   
                    Family
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 14 )
                <div class="result-title search-title">
                    Fantasy
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 36 )
                <div class="result-title search-title">
                   
                    History
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 27 )
                <div class="result-title search-title">
                   
                    Horror
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 9640 )
                <div class="result-title search-title">
                   
                    Mystery
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 878)
                <div class="result-title search-title">
                   
                Science Fiction
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 10752 )
                <div class="result-title search-title">
                   
                War
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 37 )
                <div class="result-title search-title">
                   
                Western
                </div>
                @endif --}}


            
            <div class="result-title search-title">
                @if(isset($searchGenre) && $searchGenre == 16 )
                    Animation
                @endif
                @if(isset($searchGenre) && $searchGenre == 28 )
                    Action
                @endif
                @if(isset($searchGenre) && $searchGenre == 12 )
                Adventure
                @endif
                @if(isset($searchGenre) && $searchGenre == 35 )
                    Animation
                @endif
                @if(isset($searchGenre) && $searchGenre == 80 )
                    Crime
                @endif
                @if(isset($searchGenre) && $searchGenre == 99 )
                    Documentary
                @endif
                @if(isset($searchGenre) && $searchGenre == 18 )
                    Drama
                @endif
                @if(isset($searchGenre) && $searchGenre == 10751 )
                    Family
                @endif
                @if(isset($searchGenre) && $searchGenre == 14 )
                    Fantasy
                @endif
                @if(isset($searchGenre) && $searchGenre == 36 )
                    History
                @endif
                @if(isset($searchGenre) && $searchGenre == 27 )
                    Horror
                @endif
                @if(isset($searchGenre) && $searchGenre == 9640 )
                    Mystery
                @endif
                @if(isset($searchGenre) && $searchGenre == 878)
                    Science Fiction
                @endif
                @if(isset($searchGenre) && $searchGenre == 10752 )
                    War
                @endif
                @if(isset($searchGenre) && $searchGenre == 37 )
                    Western
                @endif
            </div>
           
           
          



                <div class="search-results-content genre-results-content">


                <div class="search-results genre-results">
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
                
                            <p class="result-title genre-title">
                                {{$value['title']}} 
                            </p>
                             
                            @if(strlen($value['release_date']) > 1)
                                <p class="result-release genre-release">
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

@endsection