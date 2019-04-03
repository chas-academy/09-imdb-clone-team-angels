@extends('layouts.app')

@section('content')


<div class="profile-page flex-col">

    <div class="profile-header flex-col">
        <div class="profile-user-name flex-col sp-ce">
            {{ Auth::user()->name }}
        </div>
    </div>


    <div class="profile-body flex-row sp-ev">
            
        <div class="profile-card flex-col sp-be">
            <div>
                <h3 class="profile-card-title">
                    Welcome {{ Auth::user()->name }}!
                </h3>
                <div class="user-detail">
                    <div class="user-detail-item">
                        <h4>
                            <span>Name:</span>
                            &nbsp;{{ Auth::user()->name }}
                        </h4>
                    </div>
                    <div class="user-detail-item">  
                        <h4>
                            <span>E-mail:</span>
                            &nbsp;{{ Auth::user()->email }}
                        </h4>
                    </div>  
                </div>
            </div>
        </div>
       

        <div class="profile-card flex-col sp-be">
            <div>
                <h3 class="profile-card-title">
                    Your Watch Lists
                </h3>
                <ul>
                    @foreach($watchlists as $watchlist)
                    <div class="profile-form">
                        <form class="flex-row sp-be" method="POST" action="/watchlists/{{ $watchlist['id'] }}/delete">
                            @csrf
    
                            <a href="/watchlists/{{ $watchlist['id'] }}">
                                {{ $watchlist['title'] }}
                            </a>
                            <button class="del-list-btn" type="submit">✖</button>
                        </form>
                    </div>
                    @endforeach
                </ul>
            </div>
            <div class="new-list"> 
                <form class="flex-row sp-ce"method="POST" action="/watchlists">
                    @csrf
                    <input placeholder="Add new watchlist..." name="title" />
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
       

        <div class="profile-card flex-col sp-be">
            <div>
                <h3 class="profile-card-title">
                    Your Reviews
                </h3>
                <ul>
                    @foreach($reviews as $review)
                        <div class="profile-form">
                            <form method="POST" action="/profile/{{ $review['id'] }}/delete">
                                @csrf
                                <a href="/details/{{ $review['tmdb_id'] }}#review">
                                    <h5>{{ $review['headline'] }}</h5>
                                    {{-- <p>{{ $review['content'] }}</p> --}}
                                    Created at: <b>{{ $review['created_at'] }}</b>
                                </a>
                                <button class="del-list-btn" type="submit">✖</button>
                            </form>
                        </div>
                    @endforeach
                </ul>
            </div>   
        </div>

    </div>


</div>

@endsection
