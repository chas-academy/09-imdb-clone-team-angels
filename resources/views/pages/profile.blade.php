@extends('layouts.app')

@section('content')

    <div class="profile-card flex-col">
    {{-- <div class="profile-header"><span>&nbsp;<b>{{ Auth::user()->name }}'s</b></span> profile  </div> --}}
    <div class="profile-header"><h2>{{ Auth::user()->name }}</h2></div>

         <div class="container-profile" style="width: 100vw; height: 100vw; justify-content: space-evenly; display: flex;">

          
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
                    <h3>Welcome {{ Auth::user()->name }}!</h3>
                    <ul>
                        <div>
                            <h4>Name: {{ Auth::user()->name }}</h4>
                        </div>
                        <div>  
                            <h4>Email: {{ Auth::user()->email }}</h4>
                        </div>
                    </ul>
                </div>
           
                {{-- <div class="add-new"> 
                 
                </div> --}}
            </div>
       


            <div class="watch-lists flex-col sp-be">
                    <div>
                <h3>Your Watch Lists</h3>
                <ul>
                    @foreach($watchlists as $watchlist)
                    <div class="formform">
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

        <div class="watch-lists flex-col sp-be">
            <div>
            <h3>Your Reviews</h3>
            <ul>
                @foreach($watchlists as $watchlist)
                <div class="formform">
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
                {{-- <div class="add-new"> 
                    <h4>Add New Watchlist</h4>

                    <form method="POST" action="/watchlists">
                        @csrf

                        <!-- <label for="title">Title</label> -->
                        <input placeholder="Watchlist Title..."name="title" />
                        <button type="submit">Submit</button>
                    </form>
                </div> --}}
            </div>

        </div>



        </div>
    </div>

@endsection
