@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>新規投稿</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'places.store', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'タイトル') !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', '紹介文') !!}
                    {!! Form::textarea('content', old('content'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('image', '画像アップロード') !!}
                    {!! Form::file('image') !!}
                </div>
                
                
                {!! Form::submit('新規投稿', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
@endsection