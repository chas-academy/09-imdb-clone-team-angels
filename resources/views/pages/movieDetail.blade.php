@extends('layouts.app')

@section('content')

<div class="page-content">
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

                        <a href="#review">
                            <div class="review-link">
                                Reviews
                            </div>
                        </a>
                        
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
                            <a href='{{ url('actor/' . $cast['id']) }}'>
                                <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}">
                            </a>
                            <p>{{ $cast['name'] }}</p>
                            <p class="cast-role">{{ $cast['character'] }}</p> 
                        </div>
                        @endforeach 
                    @endif
                    </div> 
                </div>
                
        </div>              
    </div>

                    
                 
    <div class="similar-container">
        <div class="similar-content">
        <h1>Similar Movies</h1>
            <div class="similar-flex">
            @if(isset($data['similar']['results']) && count($data['similar']['results']) > 0)
                @foreach($data['similar']['results'] as $related)
                <div class="similar-mov">
                    <a href='{{ url('details/' . $related['id']) }}'>
                        <img src="https://image.tmdb.org/t/p/w500/{{ $related['poster_path'] }}">
                    </a>
                    <p>{{ $related['title'] }}</p>
                    <p>{{ substr($related['release_date'], 0 ,-6)}}</p> 
                </div>
                @endforeach 
            @endif
            </div>
        </div>
    </div>


    <div class="review-title" id="review">
    <h1>Reviews</h1>
    <div class="review-con">
  
    <div class="review-container">
      
        <div class="review">
            <div class="review-header">
                <div class="rew-star">
                    <i class="fas fa-star yellowstar"></i>
                    <i class="fas fa-star yellowstar"></i>
                    <i class="fas fa-star yellowstar"></i>
                    <i class="fas fa-star yellowstar"></i>
                    <i class="fas fa-star yellowstar"></i>
                </div>
                <div class="review-header">
                    <h3>Best movie ever!</h3>
                </div>
            </div>
            <div class="review-content">
                <h4>Lorem Ipsum</h4>
            </div>
            <div class="review-content">
                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            </div>
            <div style="width: 40vw; margin: auto; height: 20px; border-bottom: 1px solid #aaaaaa;"></div>
        </div>


        <div class="review">
            <div class="review-header">
                <div class="rew-star">
                    <i class="fas fa-star yellowstar"></i>
                    <i class="fas fa-star "></i>
                    <i class="fas fa-star "></i>
                    <i class="fas fa-star "></i>
                    <i class="fas fa-star "></i>
                </div>
                <div class="review-header">
                    <h3>Ok</h3>
                </div>
            </div>
            <div class="review-content">
                <h4>Anonym User</h4>
            </div>
            <div class="review-content">
                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            </div>
            <div style="width: 40vw; margin: auto; height: 20px; border-bottom: 1px solid #aaaaaa;"></div>
        </div>

        </div>
    </div>


    
    </div>
    </div>


    <footer>
        <div class="box">
            <div>
                @guest
                    <button class="item1"><a class="soi-footer" href="{{ route('login') }}">Login</a></button>
                    {{-- @if (Route::has('register')) --}}
                    <button class="item1"><a class="soi-footer" href="{{ route('register') }}">&nbsp;Register</a></button>
                    {{-- @endif --}}
                @else
                    
                        <a class="" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();
                            ">
                            &nbsp;Logout
                        </a>
                    

                        <a class="soi-footer" href="/dashboard">
                        &nbsp; Dash
                        </a>
                

                    <button class="item1">
                        <span><i class="fas fa-user"></i>&nbsp;<b>{{ Auth::user()->name }}</b></span> {{-- Dashboard on click --}}
                    </button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
            <p>The cineo Group</p>
            <p>Contact</p>
            <p>Support</p>
            <p>The cineo Group</p>
        </div>
        <div class="box">
            <div class="box-line">
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
    </footer>


         
    @elseif(isset($error_msg))
        <h3>
            {{$error_msg}}
        </h3>
    @endif
</div>
    
@endsection