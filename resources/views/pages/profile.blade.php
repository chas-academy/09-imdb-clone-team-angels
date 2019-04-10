@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/profile.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<div class="profile-page flex-col">

    <div class="profile-header flex-col">
        <div class="profile-user-name flex-col sp-ce">
            <p style="width: 180px; word-break: break-word; height: auto; max-height: 100px; overflow-y: overlay; text-align: center; margin: auto;">
                {{ Auth::user()->name }}
            </p>
        </div>
    </div>

    <div class="profile-body flex-row sp-ev">
        
        <div class="profile-card flex-col sp-be" style="min-height:150px; padding-bottom: 30px;">
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
                            <span style="text-transform: lowercase;">&nbsp;{{ Auth::user()->email }}</span>
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
                    <input placeholder="@if(Session::has('message')){{ Session::get('message') }}@else Add new watchlist...@endif" name="title" />
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
       

        <div class="profile-card flex-col sp-be" style="padding-bottom: 25px;">
            <div>
                <h3 class="profile-card-title">
                    Your Reviews
                </h3>
                <ul>
                    @foreach($reviews as $review)
                        <div class="profile-form">
                            <form method="POST" action="/review/{{ $review['id'] }}/delete">
                                @csrf
                                <a href="/details/{{ $review['tmdb_id'] }}#review">
                                    <h4><u>{{ $review['headline'] }}</u></h4>
                                    {{-- <p>{{ $review['content'] }}</p> --}}
                                   <span style="font-size: 12px;"><i class="far fa-clock"></i>: <b>{{ $review['created_at'] }}</b> </span>
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
