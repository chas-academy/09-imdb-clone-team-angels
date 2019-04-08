@extends('layouts.app')

@section('content')

    @foreach ($reviews as $review)
        <div class="review">
            <form method="POST" action="/review/{{ $review['id'] }}/approve">
            @csrf
 
                <div class="review-header">
                    <h5> 
                        @if($review['rating'] == 1)
                        <i class="fas fa-thumbs-up pos"></i>
                        &nbsp;&nbsp;{{ $review['headline'] }}
                        @endif
                        @if($review['rating'] == 2)
                        <i class="far fa-meh-blank neu"></i>  
                        &nbsp;&nbsp;{{ $review['headline'] }}
                        @endif
                        @if($review['rating'] == 3)
                        <i class="fa fa-thumbs-down neg"></i>  
                        &nbsp;&nbsp;{{ $review['headline'] }}
                        @endif
                    </h5>
                    {{-- <h5>{{ $review['headline'] }}</h5> --}}
                    <div>
                        <b>{{ $review['created_at'] }}</b>
                        <button type="submit">Approve</button>
                    </div>
                </div>

                <div>
                    <div class="review-content">
                        <h6>{{ $review->user()->get("name")[0]["email"]}}</h6>
                    </div>
                </div>
                <div>
                    <div class="review-content">
                        <p>{{ $review['content'] }}</p>
                    </div>
                </div>
                <div style="width: 50vw; margin: auto; height: 20px; border-bottom: 1px solid #aaaaaa;"></div>
            </form>
        </div>
    @endforeach

@endsection