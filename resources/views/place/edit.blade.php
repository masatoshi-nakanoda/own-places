@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>投稿編集</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($place, ['route' => ['places.update', $place->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            
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
                
                
                {!! Form::submit('変更', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            {!! Form::model($place, ['route' => ['places.destroy', $place->id], 'method' => 'delete']) !!}
                {!! Form::submit('投稿を削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection