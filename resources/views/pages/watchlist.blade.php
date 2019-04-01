@extends('layouts.app')

@section('content')

<form method="POST" action="/watchlists/{{ $watchlist['id'] }}">
@csrf

<input name="title" type="text" value="{{ $watchlist['title'] }}">
<button type="submit">Submit</button>
</form>

@foreach($watchlist->items()->get() as $item)
<li>
    <a href="/details/{{ $item['movie_id'] }}">
    {{ $item['title'] }}
    </a>
</li>
@endforeach


@endsection
