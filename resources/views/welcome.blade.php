@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the OWN-PLACES</h1>
            {!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection