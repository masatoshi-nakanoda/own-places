@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>パスワードリセット</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            <form class="form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="label">メールアドレス</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="label">新しいパスワード</label>
                        <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>
                        
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
                 
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="label">新しいパスワード（確認）</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         パスワードリセット
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
