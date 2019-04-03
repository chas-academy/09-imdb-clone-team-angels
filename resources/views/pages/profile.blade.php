@extends('layouts.app')

@section('content')

    <div class="profile-card flex-col">
    <div class="profile-header"><span>&nbsp;<b>{{ Auth::user()->name }}'s</b></span> profile  </div>

         <div class="container-profile">

          
            <!-- <div class="profile-status">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div> -->
        
            
            <div class="watch-lists flex-col sp-be">
                <div>
            <h3>Watchlists</h3>
            <ul>
                @foreach($watchlists as $watchlist)
                <div>
                    <form method="POST" action="/watchlists/{{ $watchlist['id'] }}/delete">
                        @csrf

                        <a href="/watchlists/{{ $watchlist['id'] }}">
                        <span style="color: black;">●</span> {{ $watchlist['title'] }}
                        </a>
                        <button class="list-del-btn" type="submit">✖</button>
                    </form>
                </div>
                @endforeach
            </ul>
            </div>
                <div class="add-new"> 
                    <h4>Add New Watchlist</h4>

                    <form method="POST" action="/watchlists">
                        @csrf

                        <!-- <label for="title">Title</label> -->
                        <input placeholder="Watchlist Title..."name="title" />
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>

            <h4>Reviews</h4>
            @foreach($reviews as $review)
            <form method="POST" action="/profile/{{ $review['id'] }}/delete">
                @csrf
                <h5>{{ $review['headline'] }}</h5>
                <p>{{ $review['content'] }}</p>
                <b>{{ $review['created_at'] }}</b>
                <button class="waves-effect waves-teal btn-flat" type="submit">X</button>
            </form>
            @endforeach
             
        </div>
    </div>

@endsection
