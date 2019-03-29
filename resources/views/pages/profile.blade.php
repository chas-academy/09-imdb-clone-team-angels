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
                        <a href="/watchlists/{{ $watchlist['id'] }}">
                        {{ $watchlist['title'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>

                <h4>Add Watchlist</h4>

                <form method="POST" action="/watchlists">
                    {{ csrf_field() }}

                    <label for="title">Title</label>
                    <input name="title" />
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
