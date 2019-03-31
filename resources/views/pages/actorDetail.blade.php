@extends('layouts.app')

@section('content')


<div class="page-content">

@if(isset($data) && count($data) > 0)

    @if(isset($data['tagged_images']['results']) && count($data['tagged_images']['results']) > 0)
        @foreach($data['tagged_images']['results'] as $backdrop)
        @if ($loop->first)
        <div class="mov-detail" 
            style="background: url('https://image.tmdb.org/t/p/w1400_and_h450_face/{{$backdrop['file_path']}}');   
            width: 100vw;
            background-size: 100vw;
            background-repeat: no-repeat;
            display: flex;
        ">
        @endif
        @endforeach
        @else
        <div class="mov-detail"
            style="background: url({{ asset('images/backdropPlaceholder.png') }});
            width: 100vw;
            background-size: 100vw;
            background-repeat: no-repeat;
        ">
    @endif

      
      
        <div class="mov-content">
        
            <div class="mov-flex-1"> 
                <div class="mov-poster">
                    @if(isset($data['profile_path']))
                        <img src='https://image.tmdb.org/t/p/w1280/{{$data['profile_path']}}'/>
                    @else
                        <img src='{{ asset('images/posterPlaceholder.png') }}' />
                    @endif
    
                    <h4>
                        @if(isset($data['known_for_department']))
                            Known for:{{ $data['known_for_department'] }}
                        @endif
                        <br/>
                        @if(isset($data['place_of_birth']))
                        {{ $data['place_of_birth'] }}
                        @endif
                    </h4>
                </div>
            </div>
        
            <div class="mov-flex-2">
        
                <h1>{{$data['name']}}</h1>

                <h5>
                    @if(strlen($data['birthday']) > 1)
                        {{$data['birthday']}}
                    @endif
                </h5>

                
                @if(isset($data['place_of_birth']))
                    {{ $data['place_of_birth'] }}
                    @endif
                
                @if(isset($data['biography']))
                    <p>{{ $data['biography'] }}</p>
                @endif

                
                <div class="mov-flex-cast">
                @if(isset($data['movie_credits']['cast']) && count($data['movie_credits']['cast']) > 0)
                    @foreach($data['movie_credits']['cast'] as $credits)
                    <div class="actor">
                        
                        <p>{{ substr($credits['release_date'], 0 ,-6)}}</p> 
                        <a href='{{ url('details/' . $credits['id']) }}'>
                            @if(isset($credits['poster_path']))
                                <img src='https://image.tmdb.org/t/p/w500/{{$credits['poster_path']}}'/>
                            @else
                                <img src='{{ asset('images/castPlaceholder.png') }}' />
                            @endif
                        </a>
                        <h5>{{ $credits['title'] }}</h5>
                        <p>{{$credits['character']}}</p>   
                    </div>
                    @endforeach 
                @endif
                </div> 

                {{--<div class="mov-flex-cast">
                @if(isset($data['tagged_images']['results']) && count($data['tagged_images']['results']) > 0)
                    @foreach($data['tagged_images']['results'] as $caste)
                    <div class="actor">
                        <a href='{{ url('actor/' . $caste['vote_count']) }}'>
                            @if(isset($caste['file_path']))
                                <img src='https://image.tmdb.org/t/p/w500/{{$caste['file_path']}}'/>
                            @else
                                <img src='{{ asset('images/castPlaceholder.png') }}' />
                            @endif
                        </a>

                    </div>
                    @endforeach 
                @endif
                </div> --}}


                
            </div>
        </div>
    
                    
    </div>       


    @elseif(isset($error_msg))
        <h3>
            {{$error_msg}}
        </h3>
    @endif
        
    </div>

    
@endsection



