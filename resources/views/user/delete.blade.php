@extends('layouts.app')

@section('content')
    @if (Auth::id() == $user->id)
        <div class="text-center">
            <h1>アカウント削除</h1>
            <p>アカウントを削除すると投稿も全て削除されます。</p>
            {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
    @else
        <p>{!! link_to_route('places.index', 'ホーム画面に戻る') !!}</p>
    @endif
    
@endsection