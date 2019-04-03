@extends('layouts.app')

@section('content')






    <div class="s-genre-container">     
        @if(isset($data) && count($data) > 0)
            <div class="genre-results-container">

                    @if(isset($searchGenre) && $searchGenre == 16 )
                    <div style="color: white; text-align: start;     width: 1080px;  font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                        {{-- {{ $searchGenre }}  --}}
                        Animation
                    </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 28 )
                <div style="color: white; text-align: start;     width: 1080px; font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                    Action
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 12 )
                <div style="color: white; text-align: start;      width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                   Adventure
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 35 )
                <div style="color: white; text-align: start;      width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                    Animation
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 80 )
                <div style="color: white; text-align: start;      width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                    Crime
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 99 )
                <div style="color: white; text-align: start;      width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                    Documentary
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 18 )
                <div style="color: white; text-align: start;      width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                    Drama
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 10751 )
                <div style="color: white; text-align: start;     width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                    Family
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 14 )
                <div style="color: white; text-align: start;    width: 1080px; font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                Fantasy
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 36 )
                <div style="color: white; text-align: start;     width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                History
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 27 )
                <div style="color: white; text-align: start;     width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                Horror
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 9640 )
                <div style="color: white; text-align: start;     width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                Mystery
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 878)
                <div style="color: white; text-align: start;     width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                Science Fiction
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 10752 )
                <div style="color: white; text-align: start;     width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                War
                </div>
                @endif
                @if(isset($searchGenre) && $searchGenre == 37 )
                <div style="color: white; text-align: start;     width: 1080px;font-size: 30px; padding-top: 100px; margin-bottom: 15px;" class="result-title">
                    {{-- {{ $searchGenre }}  --}}
                Western
                </div>
                @endif
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