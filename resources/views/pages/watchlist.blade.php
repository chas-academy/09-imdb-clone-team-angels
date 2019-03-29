@extends('layouts.app')

@section('content')

<h1>{{ $watchlist['title'] }} </h1>

@foreach($watchlist->items()->get() as $item)
<li>
    <a href="/details/{{ $item['movie_id'] }}">
    {{ $item['title'] }}
    </a>
</li>
@endforeach


@endsection
