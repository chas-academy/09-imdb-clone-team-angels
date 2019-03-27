@extends('layouts.app')

@section('content')

{{-- {{ echo  isset($error_msg) ? {echo $error_msg} : {echo $renderData} }} --}}


<div class="card grey lighten-4">
    <div class="card-content">
        @php
            echo $renderData;
        @endphp
    </div>
</div>
    
@endsection