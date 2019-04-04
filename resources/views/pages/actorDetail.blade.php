@extends('layouts.app')

@section('content')


<div class="page-content">
@if(isset($data) && count($data) > 0)

    @if(isset($data['tagged_images']['results']) && count($data['tagged_images']['results']) > 0)
        @foreach($data['tagged_images']['results'] as $backdrop)
            @if ($loop->first)
            <div class="mov-detail flex-col" 
                style="background: url('https://image.tmdb.org/t/p/w1400_and_h450_face/{{$backdrop['media']['backdrop_path']}}');   
                width: 100vw;
                background-size: 100vw;
                background-repeat: no-repeat;
                display: flex;
            ">
            @endif
        @endforeach
    @else
            <div class="mov-detail flex-col"
                style="background: url({{ asset('images/backdropPlaceholder.png') }});
                width: 100vw;
                background-size: 100vw;
                background-repeat: no-repeat;
            ">
    @endif
            <div class="mov-content flex-row">

                <div class="mov-flex-1"> 
                    <div class="mov-poster">
                        @if(isset($data['profile_path']))
                            <img src='https://image.tmdb.org/t/p/w1280/{{$data['profile_path']}}'/>
                        @else
                            <img src='{{ asset('images/posterPlaceholder.png') }}' />
                        @endif
                        <br/>
                        <h4 style="margin: 10px auto 4px auto; justify-content: center; with:260px;display: flex; flex-flow: row; flex-wrap: wrap; width: 265px; text-align: center;">
                            @if(isset($data['place_of_birth']))
                                {{ $data['place_of_birth'] }}
                            @endif   
                        </h4>
                        <br/>
                        <h5>
                            @if(strlen($data['birthday']) > 1)
                                {{$data['birthday']}}
                            @endif
                        </h5>
                        <br/>
                        <h5>
                            @if(strlen($data['deathday']) > 1)
                                Died: {{$data['deathday']}}
                            @endif
                        </h5>                
                    </div>
                </div>
            
                <div class="mov-flex-2 flex-col">
                    <h1>{{$data['name']}}</h1>
                    <div class="mov-flex-cast flex-row" >
                        @if(isset($data['movie_credits']['cast']) && count($data['movie_credits']['cast']) > 0)
                            @foreach($data['movie_credits']['cast'] as $credits)
                            <div class="actor">
                                <a href='{{ url('details/' . $credits['id']) }}'>
                                    @if(isset($credits['poster_path']))
                                        <img src='https://image.tmdb.org/t/p/w500/{{$credits['poster_path']}}'/>
                                    @else
                                        <img src='{{ asset('images/castPlaceholder.png') }}' />
                                    @endif
                                </a>
                                <h5>{{ $credits['title'] }}</h5>
                                <p style="height: 15px; overflow: hidden">
                                    {{$credits['character']}}
                                </p>   
                                @if(isset($credits['release_date']))
                                    <p>{{ substr($credits['release_date'], 0 ,-6)}}</p> 
                                @endif
                            </div>
                            @endforeach 
                        @endif
                    </div> 
                    @if(isset($data['biography']))
                        <h5 style="color: black; text-shadow: none; font-size: 15px;">Biography</h5>
                        <p>{{ $data['biography'] }}</p>
                    @endif
                </div>
            
            </div>   
    </div>     
        
    
    @if(isset($data['tagged_images']['results']) && count($data['tagged_images']['results']) > 0)
        <div class="similar-container flex-col sp-ar">
            <div class="similar-content">   
            <h1>Photos</h1>
                <div class="similar-flex flex-row">
                    @if(isset($data['tagged_images']['results']) && count($data['tagged_images']['results']) > 0)
                        @foreach($data['tagged_images']['results'] as $caste)
                        <div class="similar-mov">
                            <a href='{{ url('details/' . $caste['media']['id']) }}'>
                                @if(isset($caste['file_path']))
                                    <img style="width: auto !important;" src='https://image.tmdb.org/t/p/w500/{{$caste['file_path']}}'/>
                                @else
                                    <img src='{{ asset('images/castPlaceholder.png') }}' />
                                @endif
                            </a>
                            @if(isset($caste['media']['title']))
                                {{ $caste['media']['title'] }}
                            @endif
                        </div>
                        @endforeach 
                    @endif
                </div>
            </div>       
        </div>
    @endif


@elseif(isset($error_msg))
    <h3>
        {{$error_msg}}
    </h3>
@endif
    
</div>    
@endsection



