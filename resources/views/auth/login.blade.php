@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'login.post']) !!}
            {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            <p class="mt-2">ユーザ未登録の方は{!! link_to_route('signup.get', 'こちらへ') !!}</p>
            <p class="mt-2">パスワードを忘れた方は{!! link_to_route('passwords.reset','こちらへ') !!}</p>
        </div>
    </div>
@endsection