@extends('layouts.app')

@section('content')

<div class="card grey lighten-4">
    <div class="card-content">
        {{-- @php
            dd($data);
        @endphp --}}
        
        @if(isset($data) && count($data) > 0)

        @if(isset($data['backdrop_path']))
            <div class="mov" style="background: url('https://image.tmdb.org/t/p/w1400_and_h450_face/{{$data['backdrop_path']}}');   width: 100vw;  background-size: 100vw; background-repeat: no-repeat;"/>
        @else
            <div class="mov" style="width: 100vw;  background-size: 100vw; background-repeat: no-repeat; background: url({{ asset('images/backdropPlaceholder.png') }});"/>
        @endif
            
            <div class="mov-content">
                {{-- <a href='https://www.themoviedb.org/movie/{{$value['id']}}'></a> --}}

                    <div class="mov-flex-1"> 
                        <div class="mov-poster">
                            @if(isset($data['poster_path']))
                                <img src='https://image.tmdb.org/t/p/w1280/{{$data['poster_path']}}'/>
                            @else
                                <img src='{{ asset('images/posterPlaceholder.png') }}' />
                            @endif
            
                            <div class="mov-star">
                                <i class="fas fa-star yellowstar"></i>
                                <i class="fas fa-star yellowstar"></i>
                                <i class="fas fa-star "></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                            <button>
                                <i class="fas fa-plus"></i>
                                Add to watchlist
                            </button>
                        </div>
                    </div>

                    <div class="mov-flex-2">
                        <h3>
                            @if(strlen($data['release_date']) > 1)
                                {{$data['release_date']}}
                            @endif
                        </h3>

                        <h1>{{$data['original_title']}}</h1>

                        @if(isset($data['overview']))
                            <p>{{ $data['overview'] }}</p>
                        @endif


                        <div class="mov-flex-cast">
                             
                            <div class="actor">
                                <img src="https://m.media-amazon.com/images/M/MV5BNzg3MTgwOTgzMV5BMl5BanBnXkFtZTgwODIxMTUwMjE@._V1_UX214_CR0,0,214,317_AL_.jpg">
                                <p>Chris Pratt</p>
                                <p class="cast-role">Peter Quill</p>
                            </div>
                            <div class="actor">
                                <img src="https://m.media-amazon.com/images/M/MV5BMjA4NDk1NTA1OV5BMl5BanBnXkFtZTcwMTIzMjQ4Ng@@._V1_UY317_CR8,0,214,317_AL_.jpg">
                                <p>Zoe Saldana</p>
                                <p class="cast-role">Gamora</p>
                            </div>
                            <div class="actor">
                                <img src="https://m.media-amazon.com/images/M/MV5BMjI4NjQ5NDA5M15BMl5BanBnXkFtZTgwNDE0MjQzMjE@._V1_UY317_CR142,0,214,317_AL_.jpg">
                                <p>Dave Bautista</p>
                                <p class="cast-role">Drax</p>
                            </div>
                            <div class="actor">
                                <img src="https://m.media-amazon.com/images/M/MV5BMjExNzA4MDYxN15BMl5BanBnXkFtZTcwOTI1MDAxOQ@@._V1_UY317_CR7,0,214,317_AL_.jpg">
                                <p>Vin Diesel</p>
                                <p class="cast-role">Groot</p>
                            </div>

                            <div class="actor">
                                <img src="https://m.media-amazon.com/images/M/MV5BMjM0OTIyMzY1M15BMl5BanBnXkFtZTgwMTg0OTE0NzE@._V1_UX214_CR0,0,214,317_AL_.jpg">
                                <p>Bradley Cooper</p>
                                <p class="cast-role">Rocket</p>
                            </div>
                            <div class="actor">
                                <img src="https://m.media-amazon.com/images/M/MV5BMzk2NjE4NDgzNl5BMl5BanBnXkFtZTcwNTI3NTEzMQ@@._V1_UY317_CR16,0,214,317_AL_.jpg">
                                <p>Lee Pace</p>
                                <p class="cast-role">Ronan</p>
                            </div>
                            <div class="actor">
                                <img src="https://m.media-amazon.com/images/M/MV5BMTkwNDI5MjQ5MF5BMl5BanBnXkFtZTYwMjI1MTgz._V1_UY317_CR22,0,214,317_AL_.jpg">
                                <p>Michael Rooker</p>
                                <p class="cast-role">Yondu Udonta</p>
                            </div>
                            <div class="actor">
                                <img src="https://m.media-amazon.com/images/M/MV5BMTQwMDQ0NDk1OV5BMl5BanBnXkFtZTcwNDcxOTExNg@@._V1_UY317_CR2,0,214,317_AL_.jpg">
                                <p>Karen Gillan</p>
                                <p class="cast-role">Nebula</p>
                            </div>
                        </div>

                    </div>
                

                   

                  
                    
                    <!-- @if(isset($data['genres']) && count($data['genres']) > 0)
                        <span>
                            Genres:
                            @foreach($data['genres'] as $genre)
                                {{ $genre['name'] }}@if (!$loop->last),@endif
                            @endforeach 
                        </span>
                    @endif -->
                          
         
        @elseif(isset($error_msg))
            <h3>
                {{$error_msg}}
            </h3>
        @endif
        
    </div>
</div>
    
@endsection