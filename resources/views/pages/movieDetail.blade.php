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
                                <div style="font-size:15px; margin: auto;"> @if(isset($data['vote_average']))
                                &nbsp;&nbsp;{{ $data['vote_average'] }}&nbsp;/&nbsp;10
                                 @endif</div>
                               
                            </div>

                            <button>
                                <i class="fas fa-plus"></i>
                                Add to watchlist
                            </button>
                        </div>
                    </div>

                    <div class="mov-flex-2">
                          
                        <h1>{{$data['original_title']}}</h1>

                        <h5>
                            @if(strlen($data['release_date']) > 1)
                                {{substr($data['release_date'], 0 ,-6)}}
                            @endif
                            |
                            @if(isset($data['genres']) && count($data['genres']) > 0)
                                @foreach($data['genres'] as $genre)
                                 {{ $genre['name'] }}@if (!$loop->last),@endif
                                @endforeach 
                            @endif

                            @if(isset($data['runtime']))
                                | {{ $data['runtime'] }} m
                            @endif

                        </h5>


                     
                        @if(isset($data['overview']))
                            <p>{{ $data['overview'] }}</p>
                        @endif

                     

                        <div class="mov-flex-cast">


                        @if(isset($data['credits']['cast']) && count($data['credits']['cast']) > 0)
                                @foreach($data['credits']['cast'] as $cast)
                        <div class="actor">
                   
                                <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}">
                                <p>{{ $cast['name'] }}</p>
                                <p class="cast-role">{{ $cast['character'] }}</p> 
                                <!-- @if (!$loop->last),@endif -->
                          
                        </div>
                        @endforeach 
                        @endif
                        </div>
                       


                     
                    </div>
                    

</div>
                    
  

                    
                 
<div id="similar-container">

    <div id="similar-content">

    <h1>Similar Movies</h1>

    <div class="similar-flex">
    @if(isset($data['similar']['results']) && count($data['similar']['results']) > 0)
        @foreach($data['similar']['results'] as $related)
        <div class="similar-mov">
        <img src="https://image.tmdb.org/t/p/w500/{{ $related['poster_path'] }}">
        <p>{{ $related['title'] }}</p>
        <p>{{ substr($related['release_date'], 0 ,-6)}}</p> 
      
        </div>
        @endforeach 
@endif
    </div>

</div>



<div class="foot">
                            <div class="one">
                                    <p>The cineo Group</p>
                                    <p>Contact</p>
                                    <p>Support</p>
                                    <p>The cineo Group</p>
                            </div>
                            <div class="one">
                                <div id="linee">
                                    <i class="fab fa-twitter"></i>
                                    <i class="fab fa-twitter"></i>
                                    <i class="fab fa-twitter"></i>
                                    <i class="fab fa-twitter"></i>
                                </div>
                                    <div style="height:10px;"></div>
                                    <p>Nowhere</p>
                                    <p>23728 NW</p>
                                    <p>NWAS</p>
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