@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                @include('user.card', ['user' => Auth::user()])
            </aside>
            <div class="col-sm-8">
                @include('user.navtabs',['user' => Auth::user()])
                <div>  
                    @include('place.userplace', ['places' => $places])
                </div>
            </div>
        </div>
    @endif
@endsection