@extends('layouts.app')

@section('content')


<div class="page-content">   



@if(isset($data) && count($data) > 0)

    @if(isset($data['backdrop_path']))
    <div class="mov-detail flex-col" 
        style="background: url('https://image.tmdb.org/t/p/w1400_and_h450_face/{{$data['backdrop_path']}}');   
        width: 100vw;
        background-size: 100vw;
        background-repeat: no-repeat;
    "/>
    @else
    <div class="mov-detail flex-col"
        style="background: url({{ asset('images/backdropPlaceholder.png') }});
        width: 100vw;
        background-size: 100vw;
        background-repeat: no-repeat;
    "/>
    @endif

            <div class="mov-content flex-row">

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
                            <div style="font-size:15px; margin: auto;">
                            @if(isset($data['vote_average']))
                                &nbsp;&nbsp;{{ $data['vote_average'] }}&nbsp;/&nbsp;10
                            @endif</div>
                        </div>

                        <a href="#review">
                            <div class="review-link">
                                Reviews
                            </div>
                        </a>
                        
                        {{-- <button>
                            <i class="fas fa-plus"></i>
                            Add to watchlist
                        </button> --}}

                        <div class="watchlists-container">
                            <form method="POST" action="/watchlists/item">
                                @csrf
                
                                <div class="list-select">
                                    <!-- <label>Watchlist</label> -->
                                    <select size=1 name="watchlist_id" required>
                                   
                                    @if(Session::has('message'))
                                    <option value="" disabled selected>{{ Session::get('message') }}</option> 
                                    @else 
                                    <option value="" disabled selected>My watch lists</option> 
                                    @endif
                                    @foreach($watchlists as $watchlist)
                                        <option value="{{ $watchlist['id'] }}"> {{ $watchlist['title'] }}</option>
                                        lmao
                                    @endforeach
                                    </select>
                                    <!-- @if(Session::has('message'))
                                <p style="margin-top: 5px; font-size: 13px; color: lightgreen;">{{ Session::get('message') }}</p>
                                @endif -->
                                </div>
                                <input type="hidden" name="movie_id" value="{{ $data['id'] }}" />
                                <input type="hidden" name="title" value="{{ $data['original_title'] }}" />
                                <input type="hidden" name="redirect_to" value="/details/{{ $data['id'] }}" />
                                <button type="submit">Add to watchlist</button>
                              
                            </form>
                        
                        </div>

                    </div>
                </div>

                    <div class="mov-flex-2 flex-col">
                        <h1>{{$data['original_title']}}</h1>
                 
                        <h5 style="display: flex; flex-direction: row;">
                            @if(strlen($data['release_date']) > 1)
                                {{substr($data['release_date'], 0 ,-6)}}
                            @endif
                            |
                           {{-- @if(isset($data['genres']) && count($data['genres']) > 0)
                                @foreach($data['genres'] as $genre)
                                    {{ $genre['name'] }}@if (!$loop->last),@endif
                                @endforeach 
                            @endif
                            --}}
                            <div>
                            <form action="{{url('/searchresultsgenre')}}" method="POST">
                                    @csrf
                                    
                                        @if(isset($data['genres']) && count($data['genres']) > 0)
                                            @foreach($data['genres'] as $genre)
                                        <button style="color: white; text-shadow: 1px 1px 4px black; font-size:13px; background: none; border: none;" class="genreButton" name="movieGenre" value="{{ $genre['id'] }}" type="submit">
                                            {{ $genre['name'] }}
                                        </button>
                                        @if (!$loop->last),@endif
                                            @endforeach 
                                            @endif
                                    <!-- <div class="row"></div> -->
                                </form>
                           </div>
                          
                          
                                {{--
                                <form class="searchform" action="{{url('/searchresultsgenre')}}" method="POST">
                                    @csrf
                                    <div class="search-input-field">
                                        <select id="search-input" name="movieGenre">
                                            @if(isset($data['genres']) && count($data['genres']) > 0)
                                            @foreach($data['genres'] as $genre)
                                            <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                                                @if (!$loop->last),@endif
                                            @endforeach 
                                            @endif
                                        
                                        </select>
                                        <button class="item1" type="submit" name="action">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        &nbsp;
                                    </div>
                                    <!-- <div class="row"></div> -->
                                </form>
                                --}}   
                                {{-- 
                                <form class="searchform" action="{{url('/searchresultsgenre')}}" method="POST">
                                    @csrf
                                    <div class="search-input-field">
                                        @if(isset($data['genres']) && count($data['genres']) > 0)
                                            @foreach($data['genres'] as $genre)
                                        <button style="color: black;" name="movieGenre" value="{{ $genre['id'] }}" class="item1" type="submit">
                                            {{ $genre['name'] }}
                                        </button>
                                        @if (!$loop->last),@endif
                                            @endforeach 
                                            @endif
                                    </div>
                                    <!-- <div class="row"></div> -->
                                </form>
                                --}}



                            @if(isset($data['runtime']))
                                | {{ $data['runtime'] }} m
                            @endif
                        </h5>
                
                        <h5>
                            @if(isset($data['credits']['crew']) && count($data['credits']['crew']) > 0)
                                @foreach($data['credits']['crew'] as $crew)
                                @if ($loop->first)
                                Director: {{ $crew['name'] }}
                                @endif
                                @endforeach 
                            @endif
                        </h5>

                        @if(isset($data['overview']))
                            <p>{{ $data['overview'] }}</p>
                        @endif

                        <div class="mov-flex-cast flex-row">
                        @if(isset($data['credits']['cast']) && count($data['credits']['cast']) > 0)
                            @foreach($data['credits']['cast'] as $cast)
                            <div class="actor">
                                <a href='{{ url('actor/' . $cast['id']) }}'>
                                    @if(isset($cast['profile_path']))
                                        <img src='https://image.tmdb.org/t/p/w500/{{$cast['profile_path']}}'/>
                                    @else
                                        <img src='{{ asset('images/castPlaceholder.png') }}' />
                                    @endif
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

{{--

        <div class="trailer-container flex-col sp-ce">
            <h3>Trailer</h3>
            @if(isset($data['videos']['results']) && count($data['videos']['results']) > 0)
                @foreach($data['videos']['results'] as $trailer)
                    @if ($loop->first)
                        <iframe  width="650" height="315" src="https://www.youtube.com/embed/{{ $trailer['key'] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                    @endif
                @endforeach 
            @endif
        </div>       
            
        --}}

        <div class="similar-container flex-col">
            <div class="similar-content">
            <h1>Similar Movies</h1>
                <div class="similar-flex flex-row">
                @if(isset($data['similar']['results']) && count($data['similar']['results']) > 0)
                    @foreach($data['similar']['results'] as $related)
                    <div class="similar-mov">
                        <a href='{{ url('details/' . $related['id']) }}'>
                            <img src="https://image.tmdb.org/t/p/w500/{{ $related['poster_path'] }}">
                        </a>
                        <p>{{ $related['title'] }}</p>
                        <p>{{ substr($related['release_date'], 0 ,-6) }}</p> 
                    </div>
                    @endforeach 
                @endif
                </div>
            </div>
        </div>


        <div class="review-title" id="review">
            <h1>Reviews</h1>
            <div class="review-con">
                <div class="review-container flex-col">
                    <div class="review">
                        <div class="review-header flex-row">
                            <div class="rew-star flex-row">
                                <i class="fas fa-star yellowstar"></i>
                                <i class="fas fa-star yellowstar"></i>
                                <i class="fas fa-star yellowstar"></i>
                                <i class="fas fa-star yellowstar"></i>
                                <i class="fas fa-star yellowstar"></i>
                            </div>
                            <div class="review-header flex-row">
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
                        <div class="review-header flex-row">
                            <div class="rew-star flex-row">
                                <i class="fas fa-star yellowstar"></i>
                                <i class="fas fa-star "></i>
                                <i class="fas fa-star "></i>
                                <i class="fas fa-star "></i>
                                <i class="fas fa-star "></i>
                            </div>
                            <div class="review-header flex-row">
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


    <footer class="flex-row">
        <div class="box flex-col">
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
            
            
            <a href="/">
                <p>The cineo Group</p>
            </a>
            <a href="/">
                <p>Contact</p>
            </a>
            <a href="/">
                <p>Support</p>
            </a>
            <a href="/">
                <p>About us</p>
            </a>

        </div>

        <div class="box flex-col">
            <div class="box-line flex-row">
                <a href="/">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="/">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="/">
                    <i class="fab fa-facebook-square"></i>
                </a>
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