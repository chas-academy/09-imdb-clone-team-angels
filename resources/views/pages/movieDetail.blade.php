@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/detail.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<div class="page-content">
    @if(isset($data) && count($data) > 0)
        @if(isset($data['backdrop_path']))
        <div class="mov-detail flex-col sp-ar" style="background: url('https://image.tmdb.org/t/p/w1400_and_h450_face/{{$data['backdrop_path']}}'); width: 100vw; background-size: 100vw;background-repeat: no-repeat;" />
        @else
        <div class="mov-detail flex-col sp-ar" style="background: url({{ asset('images/backdropPlaceholder.png') }});width: 100vw;background-size: 100vw;background-repeat: no-repeat;" />
        @endif
            <div class="mov-content flex-row sp-be">
                <div class="mov-flex-1">
                    <div class="mov-poster flex-col">
                        @if(isset($data['poster_path']))
                            <img src='https://image.tmdb.org/t/p/w1280/{{$data['poster_path']}}' />
                        @else
                            <img src='{{ asset('images/posterPlaceholder.png') }}' />
                        @endif
                        <div class="mov-star flex-row sp-ar">
                            @php
                                $totalPositive = 0;
                                $totalNeutral = 0;
                                $totalNegative = 0;
                                foreach ($reviews as $review)
                                {
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
                            <div class="emo"> 
                                <i class="fas fa-thumbs-up"></i>
                                <p>{{$totalPositive}}</p>
                            </div>
                            <div class="emo">
                                <i class="far fa-meh-blank"></i>  
                                <p>{{$totalNeutral}}</p>
                            </div>
                            <div class="emo">
                                <i class="fa fa-thumbs-down"></i>  
                                <p>{{$totalNegative}}</p>
                            </div>
                            <div style="font-size:15px; margin: 8px 0 auto 0;">
                                @if(isset($data['vote_average']))
                                    &nbsp;&nbsp;{{ $data['vote_average'] }}&nbsp;<b>/&nbsp;10</b>
                                @endif
                            </div>
                        </div>
                        <div class="watchlists-container">
                            <a href="#review">
                                <div class="review-link">
                                    Reviews
                                </div>
                            </a>
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
                        <p>
                            {{ $data['overview'] }}
                        </p>
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




    </div>



        @if (Auth::user())
        <div class="mov-detail flex-col sp-ar" style="width: 100vw; height: 250px;" >
            <div class="mov-content flex-row" style="margin-top: unset;">
                <div class="mov-flex-1">
                    <div class="mov-poster flex-col"> 
                        @if(isset($watchlists) && count($watchlists) > 0)
                        <div>  
                            <form style="display: flex; margin-bottom: 10px;" method="POST" action="/watchlists/item">
                            @csrf
                                <div class="list-select">
                                    <select size=1 name="watchlist_id" required>
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
                                    <button style="background: #dddddd; border: none; padding: 0 6px 0 6px; border-radius: 0 5px 5px 0;"type="submit">Add to watchlist</button>
                                @endif
                            </form>
                        </div> 
                        @endif 
                        <div class="add-review flex-col">
                            <form method="POST" action="/review/store/">
                            @csrf
                                <div>
                                    <input type="text" placeholder="Headline" name="headline" required />
                                    <select name="rating" required>
                                        <option value="" disabled selected>Rating</option> 
                                        <option value="1">Positive</option>
                                        <option value="2">Neutral</option>
                                        <option value="3">Negative</option>
                                    </select>
                                </div>
                                <div>
                                    <textarea cols="30" rows="10" name="content" placeholder="Content..." required></textarea>
                                </div>
                                <div>
                                    @if(Session::has('reviewMessage'))
                                        <button type="submit" style="color: green;">{{ Session::get('reviewMessage') }}</button>
                                    @else
                                        <button type="submit">Add review</button>
                                    @endif
                                </div>
                                <input type="hidden" name="tmdb_id" value="{{ $data['id'] }}" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mov-flex-2 flex-col" style="height: 300px;">
                </div> 
            </div>
        </div>
        @endif
        
        


    </div>
    </div>
    </div>


        @if(isset($data['similar']['results']) && count($data['similar']['results']) > 0)
        <div class="similar-container flex-col sp-ar">
            <div class="similar-content">
                <h1>Similar Movies</h1>
                <div class="similar-flex flex-row">
                    @foreach($data['similar']['results'] as $related)
                    <div class="similar-mov">
                        <a href='{{ url('details/' . $related['id']) }}'>
                            <img src="https://image.tmdb.org/t/p/w500/{{ $related['poster_path'] }}">
                        </a>
                        <p>{{ $related['title'] }}</p>
                        <p>{{ substr($related['release_date'], 0 ,-6) }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        
        @if(isset($data['videos']['results']) && count($data['videos']['results']) > 0)
        <div class="trailer-container flex-col sp-ce">
            <h3>Trailer</h3>
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

        @include('components.reviewsPartial')

    @elseif(isset($error_msg))
        <h3>
            {{$error_msg}}
        </h3>
    @endif
</div>
@endsection