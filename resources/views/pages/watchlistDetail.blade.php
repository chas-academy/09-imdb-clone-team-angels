@extends('layouts.app')

@section('content')

<head>
    <link href="{{ asset('css/watchlistDetail.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<div class="watchlist-page flex-col sp-ev">
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
                @if (count($watchlist->items()->get()) > 0)                
                    @foreach($watchlist->items()->get() as $item)
                    <div class="watch-item flex-row sp-be">
                        <form method="POST" action="/watchlists/{{ $watchlist['id'] }}/items/{{ $item['id'] }}/delete">
                            @csrf
                            <a href="/details/{{ $item['movie_id'] }}">
                                <span style="color: black">{{ $item['title'] }}</span>
                            </a>
                            <button class="del-list-btn" type="submit">✖</button>
                        </form>
                    </div>
                    @endforeach
                @else
                    <div class="watch-item flex-row sp-be">
                
                                <span style="color: black; text-align: center; width:70vw;">No movies in the list.</span>
                        
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
            {{-- @foreach($watchlist->get() as $list)
            <div class="watch-item flex-row sp-be">
                <a href="/watchlists/{{ $list['id'] }}">
                    {{ $list['title'] }}
                </a>
                <button class="del-list-btn" type="submit">✖</button>
            </div>
            @endforeach --}}

            @foreach($watchlist->get() as $watchlist)
            <div class="watch-item flex-row sp-be">
                <form method="POST" action="/watchlists/{{ $watchlist['id'] }}/delete">
                    @csrf
                    <a style="color: black;" href="/watchlists/{{ $watchlist['id'] }}">
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
