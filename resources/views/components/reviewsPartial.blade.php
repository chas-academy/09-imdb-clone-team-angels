<head>
    <link href="{{ asset('css/reviews.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<div class="review-title" id="review">
    <h1>Reviews</h1>
    <div class="review-con">
        <div class="review-container">
        @if(isset($reviews))
            @foreach ($reviews as $review)

                @if($review['approved'] == false)
                    @cannot('browse_admin')
                        @auth
                            @if(Auth::id()!=$review['user_id'])
                                <div class="review">
                                    <div class="review-content">
                                        <h5>* A review pending approval</h5>
                                    </div>
                                    <div style="width: 50vw; margin: auto; height: 20px; border-bottom: 1px solid #aaaaaa;"></div>
                                </div>
                                @continue
                            @endif
                        @endauth
                    @endcannot
                @endif
                
                <div class="review">

                    <div class="review-header">
                        <h5> 
                            @if($review['approved'] == false)
                                <span style="color: orange;"><u>PENDING</u></span>
                                <br>
                            @endif
                            <small style="opacity: 0.5;">Title:</small>&nbsp;&nbsp;{{ $review['headline'] }}
                            <br>
                            <small style="opacity: 0.5;">By:</small>&nbsp;&nbsp;{{ $review->user()->get("name")[0]["name"] }}&nbsp;<small style="opacity: 0.5;">[{{ $review->user()->get("email")[0]["email"] }}]</small>
                            <br>
                            <small style="opacity: 0.5;">Rating:</small>&nbsp;
                            @if($review['rating'] == 1)
                                <i class="fas fa-thumbs-up pos"></i>
                            @endif

                            @if($review['rating'] == 2)
                                <i class="far fa-meh-blank neu"></i>  
                            @endif

                            @if($review['rating'] == 3)
                                <i class="fa fa-thumbs-down neg"></i>  
                            @endif
                        </h5>
                        
                        @can('browse_admin')
                            @if($review['approved'] == false)
                                <form method="POST" id="approveReview{{ $review['id'] }}" action="/review/{{ $review['id'] }}/approve">
                                    @csrf
                                    <button style="font-size: 1.6em;" form="approveReview{{ $review['id'] }}" type="submit"><i class="fas fa-clipboard-check" style="padding: 0 0.4vw; color: green;"></i></button>
                                </form>
                            @endif
                        @endcan

                        @auth
                            @if(Auth::user()->hasRole('admin') || Auth::id()==$review['user_id'])
                                <form method="POST" id="deleteReview{{ $review['id'] }}" action="/review/{{ $review['id'] }}/delete">
                                    @csrf
                                    <button style="font-size: 1.6em;" form="deleteReview{{ $review['id'] }}" type="submit"><i style="font-style: normal; padding: 0 0.4vw; color: red;">✖</i></button>
                                </form>
                            @endif
                        @endauth

                        <div>
                            <a href="/details/{{$review['tmdb_id']}}#review"><span style="font-size: 0.6em; color: blueviolet;"><b>{{ $review['created_at'] }}</b></span></a>
                        </div>
                    </div>

                    <div class="review-content">
                        <h6>{{ $review->user()->get("name")[0]["email"]}}</h6>
                    </div>
                    
                    <div class="review-content">
                        <p>{{ $review['content'] }}</p>
                    </div>
                    
                    <div style="width: 50vw; margin: auto; height: 20px; border-bottom: 1px solid #aaaaaa;"></div>

                </div>
             
            @endforeach
        @endif
        </div>
    </div>
</div>