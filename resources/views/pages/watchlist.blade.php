@extends('layouts.app')

@section('content')

<div class="watchlist-page">
    <div class="watchlist-card">

        <div class="watchlist-items-card">
            <div class="title-new"> 
                <form method="POST" action="/watchlists/{{ $watchlist['id'] }}">
                @csrf
                    <input name="title" type="text" value="{{ $watchlist['title'] }}">
                    <!-- <button type="submit">Submit</button> -->
                </form>
            </div>
            <div class="watch-items">
                @foreach($watchlist->items()->get() as $item)
                <div class="watch-item flex-row sp-be">
                    <form method="POST" action="/watchlists/{{ $watchlist['id'] }}/items/{{ $item['id'] }}/delete">
                        @csrf
                        <a href="/details/{{ $item['movie_id'] }}">
                        <span style="color: white">●</span> {{ $item['title'] }}
                        </a>
                        <button class="del-list-btn" type="submit">✖</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

    </div>



    <div class="watchlist-items-card">
        <div class="title-new"> 
            Watchlists
        </div>
        <div class="watch-items">
            @foreach($watchlist->get() as $list)
            <div class="watch-item flex-row sp-be">
                <a href="/watchlists/{{ $list['id'] }}">
                    <span style="color: white">●</span> {{ $list['title'] }}
                </a>
                <button class="del-list-btn" type="submit">✖</button>
            </div>
            @endforeach
        </div>
    </div>
   

</div>
@endsection
