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
                @if (count($places) > 0)
                    @include('place.userplace', ['places' => $places])
                @endif
                </div>
                <div style="text-align:center;">
                    {!! link_to_route('places.create', '新規投稿', [], ['class' => 'center-block btn btn-lg btn-primary' ]) !!}
                </div>
            </div>
        </div>
    @endif
@endsection