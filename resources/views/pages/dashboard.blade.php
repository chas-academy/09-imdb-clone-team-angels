@extends('layouts.app')

@section('content')

            <div class="dash">
                <div class="dash-header">Dashboard</div>

                <div class="dash-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

@endsection
