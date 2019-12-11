@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>パスワードリセット</h1>
    </div>
                
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

        <form class="form" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="label">メールアドレス</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    パスワードリセットメールを送る
                </button>
            </div>
        </form>
        </div>
    </div>
@endsection
