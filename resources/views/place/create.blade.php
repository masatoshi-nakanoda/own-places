@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>新規投稿</h1>
        <p>※は必須項目です。</p>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'places.store', 'enctype' => 'multipart/form-data']) !!}
            {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('title', '※タイトル') !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'required' => 'required', 'maxlength' => '191']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', '※紹介文(191文字までです)') !!}
                    {!! Form::textarea('content', old('content'),['class' => 'form-control', 'required' => 'required', 'maxlength' => '191']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('lat', '※緯度（lat）') !!}
                    {!! Form::number('lat', old('lat'),['class' => 'form-control', 'step' => 'any', 'required' => 'required']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('lng', '※経度（lng）') !!}
                    {!! Form::number('lng', old('lng'),['class' => 'form-control', 'step' => 'any', 'required' => 'required']) !!}
                </div>
                
                <p>緯度・経度は<a href="/map" target="brank">こちら</a>で検索してくだい</p>
                
                <div class="form-group">
                    {!! Form::label('tag', 'タグ') !!}
                    {!! Form::text('tag', old('tag'),['class' => 'form-control']) !!}
                </div>
                
                <p>タグはカンマ区切り(,)で入力してください。（例:東京駅,お店）</p>
                
                <div class="form-group">
                    {!! Form::label('image', '※画像アップロード') !!}
                    {!! Form::file('image', ['required' => 'required']) !!}
                </div>
                
                
                {!! Form::submit('新規投稿', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
@endsection