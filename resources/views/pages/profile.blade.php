@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <h3>Watchlists</h3>
                <ul>
                    @foreach($watchlists as $watchlist)
                    <li>
                        <form method="POST" action="/watchlists/{{ $watchlist['id'] }}/delete">
                            @csrf

                            <a href="/watchlists/{{ $watchlist['id'] }}">
                                {{ $watchlist['title'] }}
                            </a>
                            <button class="waves-effect waves-teal btn-flat" type="submit">X</button>
                        </form>
                    </li>
                    @endforeach
                </ul>

                <h4>Add Watchlist</h4>

                <form method="POST" action="/watchlists">
                    @csrf

                    <label for="title">Title</label>
                    <input name="title" />
                    <button type="submit">Submit</button>
                </form>
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
</div>
@endsection
