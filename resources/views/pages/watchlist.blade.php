@extends('layouts.app')

@section('content')

<div class="container-list">

   
        <div class="watch-list">
            <div class="title-new"> 
                <form method="POST" action="/watchlists/{{ $watchlist['id'] }}">
                @csrf

                <input name="title" type="text" value="{{ $watchlist['title'] }}">
                <!-- <button type="submit">Submit</button> -->
                </form>
            </div>
            <div class="list">
            <div class="watch-items">
                @foreach($watchlist->items()->get() as $item)
                <div class="watch-item">
                    <a href="/details/{{ $item['movie_id'] }}">
                    <span style="color: white">●</span> {{ $item['title'] }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection
