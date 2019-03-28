@extends('layouts.app')

@section('content')

        <div class="card grey lighten-3">
            <div class="card-content white-text">
                <div class="row center-align">
                    <form class="col s6 offset-s3" action="{{url('/searchresults')}}" method="POST">
                        @csrf
                    
                        <div class="input-field">
                            <input id="search" name="movieName" type="text" >
                            <label for="search">Search</label>
                        </div>

                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>    
        </div>

@endsection