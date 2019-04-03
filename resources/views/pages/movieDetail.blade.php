@extends('layouts.app')

@section('content')


<div class="page-content">
    @if(isset($data) && count($data) > 0)

    @if(isset($data['backdrop_path']))
    <div class="mov-detail flex-col" style="background: url('https://image.tmdb.org/t/p/w1400_and_h450_face/{{$data['backdrop_path']}}');   
        width: 100vw;
        background-size: 100vw;
        background-repeat: no-repeat;
    " />
    @else
    <div class="mov-detail flex-col" style="background: url({{ asset('images/backdropPlaceholder.png') }});
        width: 100vw;
        background-size: 100vw;
        background-repeat: no-repeat;
    " />
    @endif

    <div class="mov-content flex-row">
        <div class="mov-flex-1">
            <div class="mov-poster">
                @if(isset($data['poster_path']))
                <img src='https://image.tmdb.org/t/p/w1280/{{$data['poster_path']}}' />
                @else
                <img src='{{ asset('images/posterPlaceholder.png') }}' />
                @endif

                <div class="mov-star flex-row">





            {{-- <button>
                    <i class="fas fa-plus"></i>
                    Add to watchlist
                </button> --}}

                @if(isset($reviews) && count($reviews) > 0)
                    <a href="#review">
                        <div class="review-link">
                            Reviews
                        </div>
                    </a>

                    @php
                        $totalPositive = 0;
                        $totalNeutral = 0;
                        $totalNegative = 0;
                        foreach ($reviews as $review) {
                            if($review['rating'] == 1){
                                $totalPositive = $totalPositive+1;
                            }
                            if($review['rating'] == 2){
                                $totalNeutral = $totalNeutral+1;
                            }
                            if($review['rating'] == 3){
                                $totalNegative = $totalNegative+1;
                            }
                        }                
                    @endphp

                <div class="watchlists-container">
                    <div class="emo">
                        <i class="fas fa-thumbs-up pos"></i>
                        <p>{{$totalPositive}}</p>
                    </div>

                    <div class="emo">
                        <i class="far fa-meh-blank neu"></i>  
                        <p>{{$totalNeutral}}</p>
                    </div>

                    <div class="emo">
                        <i class="fa fa-thumbs-down neg"></i>  
                        <p>{{$totalNegative}}</p>
                    </div>

                    <div style="font-size:15px;">
                        @if(isset($data['vote_average']))
                            &nbsp;&nbsp;{{ $data['vote_average'] }}&nbsp;<b>/&nbsp;10</b>
                        @endif
                    </div>

                </div>
                @endif

                @if(isset($watchlists) && count($watchlists) > 0)
                    <div class="watchlists-container">
                        <form method="POST" action="/watchlists/item">
                            @csrf

                            <div class="list-select">
                                <select size=1 name="watchlist_id" required>
                                    {{-- @if(Session::has('message'))
                                        <option value="" disabled selected>{{ Session::get('message') }}</option>
                                    @else
                                    <option value="" disabled selected>My watch lists</option>
                                    @endif --}}
                                    <option value="" disabled selected>My watch lists</option>

                                    @foreach($watchlists as $watchlist)
                                    <option value="{{ $watchlist['id'] }}"> {{ $watchlist['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="movie_id" value="{{ $data['id'] }}" />
                            <input type="hidden" name="title" value="{{ $data['original_title'] }}" />
                            <input type="hidden" name="redirect_to" value="/details/{{ $data['id'] }}" />
        
                            @if(Session::has('message'))
                                <button type="submit" style="color: green;">{{ Session::get('message') }}</button>
                            @else
                                <button type="submit">Add to watchlist</button>
                            @endif
                        
                    </div>

                    
                @endif

                </form>
            </div>
        </div>
    </div>


    <div class="mov-flex-2 flex-col">
        <h1>{{$data['original_title']}}</h1>

        <h5 style="display: flex; flex-direction: row;">
            @if(strlen($data['release_date']) > 1)
                {{substr($data['release_date'], 0 ,-6)}} |
            @endif

            <div>
                <form action="{{url('/searchresultsgenre')}}" method="POST">
                    @csrf
                    @if(isset($data['genres']) && count($data['genres']) > 0)
                    @foreach($data['genres'] as $genre)
                    <button
                        style="color: white; text-shadow: 1px 1px 4px black; font-size:13px; background: none; border: none;"
                        class="genreButton" name="movieGenre" value="{{ $genre['id'] }}" type="submit">
                        {{ $genre['name'] }}
                    </button>
                    @if (!$loop->last),@endif
                    @endforeach
                    @endif
                </form>
            </div>

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
                    <img src='https://image.tmdb.org/t/p/w500/{{$cast['profile_path']}}' />
                    @else
                    <img src='{{ asset('images/castPlaceholder.png') }}' />
                    @endif
                </a>
                <p>{{ $cast['name'] }}</p>
                <p style="height: 30px; overflow: hidden" class="cast-role">{{ $cast['character'] }}</p>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

</div>



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
        <div class="review-container">


            <form method="POST" action="/review/store/">
                @csrf
                <select name="rating">
                    <option value="1">Positive</option>
                    <option value="2" selected>Neutral</option>
                    <option value="3">Negative</option>
                </select>

                <input type="text" placeholder="Headline" name="headline" />
                <textarea cols="30" rows="10" name="content" placeholder="Content..."></textarea>

                <input type="hidden" name="tmdb_id" value="{{ $data['id'] }}" />

                <button type="submit">Add review</button>
            </form>



            @if(isset($reviews))
            @foreach($reviews as $review)
            <div class="review">
                <form method="POST" action="/reviews/{{ $review['id'] }}/delete">
                    @csrf

                    <div class="review-header">
                        <ul>
                            <li>
                                @if($review['rating'] == 1)
                                Positive
                                @endif
                                @if($review['rating'] == 2)
                                Neutral
                                @endif
                                @if($review['rating'] == 3)
                                Negative
                                @endif
                            </li>
                        </ul>

                        <div class="review-header">
                            @if (Auth::user() && (Auth::user()->id == $review->user_id))
                            <button class="waves-effect waves-teal btn-flat" type="submit">X</button>
                            @endif
                            <h5>{{ $review['headline'] }}</h5>
                            <b>{{ $review['created_at'] }}</b>
                        </div>
                    </div>

                    <div class="review-content">
                        <h6>{{ $review->user()->get("email")[0]["email"]}}</h6>
                    </div>

                    <div class="review-content">
                        <p>{{ $review['content'] }}</p>
                    </div>

                    <div style="width: 40vw; margin: auto; height: 20px; border-bottom: 1px solid #aaaaaa;"></div>
                </form>
            </div>
            @endforeach
            @endif
        </div>
    </div>

    @if(isset($data['videos']['results']) && count($data['videos']['results']) > 0)
    <div class="trailer-container flex-col sp-ce">
        <h3 style="text-align: center;">Trailer</h3>
        @if(isset($data['videos']['results']) && count($data['videos']['results']) > 0)
        @foreach($data['videos']['results'] as $trailer)
        @if ($loop->first)
        <iframe style="margin: 0 auto 150px auto;" width="650" height="315"
            src="https://www.youtube.com/embed/{{ $trailer['key'] }}" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        @endif
        @endforeach
        @endif
    </div>
    @endif


    @elseif(isset($error_msg))
    <h3>
        {{$error_msg}}
    </h3>
    @endif
</div>

@endsection