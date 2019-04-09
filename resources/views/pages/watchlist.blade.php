@extends('layouts.app')

@section('content')

<div class="watchlist-page flex-col sp-ev">


    <div class="watchlist-card flex-row">
        <div class="watchlist-items-card">
            <div class="title-new flex-row"> 
                <form method="POST" action="/watchlists/{{ $watchlist['id'] }}">
                @csrf
                    <input name="title" type="text" value="{{ $watchlist['title'] }}">
                </form>
            </div>
            <div class="watch-items">
                @if (count($watchlist->items()->get()) > 0)                
                    @foreach($watchlist->items()->get() as $item)
                    <div class="watch-item flex-row sp-be">
                        <form method="POST" action="/watchlists/{{ $watchlist['id'] }}/items/{{ $item['id'] }}/delete">
                            @csrf
                            <a href="/details/{{ $item['movie_id'] }}">
                                <span >{{ $item['title'] }}</span>
                            </a>
                            <button class="del-list-btn" type="submit">✖</button>
                        </form>
                    </div>
                    @endforeach
                @else
                    <div class="watch-item flex-row sp-be">
                        <span class="Watchlist-none">No movies in the watchlist.</span>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div class="watchlist-items-card" style="background:#ffffff87;">
        <div class="watch-items">
            <div class="title-new"> 
                Watchlists
            </div>
            @foreach($watchlist->get() as $watchlist)
                <div class="watch-item flex-row sp-be">
                    <form method="POST" action="/watchlists/{{ $watchlist['id'] }}/delete">
                        @csrf
                        <a href="/watchlists/{{ $watchlist['id'] }}">
                            {{ $watchlist['title'] }}
                        </a>
                        <button class="del-list-btn" type="submit">✖</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
   

</div>
@endsection
