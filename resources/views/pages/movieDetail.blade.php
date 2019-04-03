@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<p>{{ Session::get('message') }}</p>
@endif

<div class="card grey lighten-4">
    <div class="card-content">
        {{-- @php
            dd($data);
        @endphp --}}
        
        @if(isset($data) && count($data) > 0)
            <ul class="collection">
                <li class="collection-item">
                    {{-- <a href='https://www.themoviedb.org/movie/{{$value['id']}}'></a> --}}
                    <span class="title">
                        <h5>
                            {{$data['original_title']}} 
                            @if(strlen($data['release_date']) > 1)
                                <i>({{$data['release_date']}})</i>
                            @endif
                        </h5>
                    </span>

                    @if(isset($data['poster_path']))
                        <img src='https://image.tmdb.org/t/p/w1280/{{$data['poster_path']}}' style='height: 180px;'/>
                    @else
                        <img src='{{ asset('images/posterPlaceholder.png') }}' style='height: 180px;'/>
                    @endif

                    @if(isset($data['overview']))
                        <br>
                        <span>{{ $data['overview'] }}</span>
                    @endif

                    @if(isset($data['backdrop_path']))
                        <img src='https://image.tmdb.org/t/p/w1400_and_h450_face/{{$data['backdrop_path']}}' style='height: 225px;'/>
                    @else
                        <img src='{{ asset('images/backdropPlaceholder.png') }}' style='height: 225px;'/>
                    @endif
                    
                    @if(isset($data['genres']) && count($data['genres']) > 0)
                        <span>
                            Genres:
                            @foreach($data['genres'] as $genre)
                                {{ $genre['name'] }}@if (!$loop->last),@endif
                            @endforeach 
                        </span>
                    @endif

                    <form method="POST" action="/watchlists/item">
                        @csrf

                        <div class="input-field col s12">
                            <select size=1 name="watchlist_id">
                            @foreach($watchlists as $watchlist)
                             <option value="{{ $watchlist['id'] }}"> {{ $watchlist['title'] }}</option>
                            @endforeach
                            </select>
                            <label>Watchlist</label>
                        </div>
                        <input type="hidden" name="movie_id" value="{{ $data['id'] }}" />
                        <input type="hidden" name="title" value="{{ $data['original_title'] }}" />
                        <input type="hidden" name="redirect_to" value="/details/{{ $data['id'] }}" />
                        <button type="submit">Add to watchlist</button>
                    </form>
                
                </li>
            </ul>
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

                <div style="background: grey;">
                    Positive: {{$totalPositive}}
                    Neutral: {{$totalNeutral}}
                    Negative: {{$totalNegative}}
                </div>
            @endif
 
            @if(isset($reviews))
                @foreach($reviews as $review)
                <form method="POST" action="/reviews/{{ $review['id'] }}/delete">
                    @csrf
                    <h6>{{ $review->user()->get("email")[0]["email"]}}</h6>
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
                    <h5>{{ $review['headline'] }}</h5>
                    <p>{{ $review['content'] }}</p>
                    <b>{{ $review['created_at'] }}</b>
                    @if (Auth::user() && (Auth::user()->id == $review->user_id))
                        <button class="waves-effect waves-teal btn-flat" type="submit">X</button>
                    @endif
                    </form>
                @endforeach
            @endif
        @elseif(isset($error_msg))
            <h3>
                {{$error_msg}}
            </h3>
        @endif
        
    </div>
</div>
    
@endsection 