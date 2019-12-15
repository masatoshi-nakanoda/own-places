@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @if (Auth::id() == $user->id)
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
        @else
            <p>{!! link_to_route('places.index', 'ホーム画面に戻る') !!}</p>
        @endif
    @endif
@endsection