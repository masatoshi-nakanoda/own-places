@if (Auth::user()->is_like($place->id))
        {!! Form::open(['route' => ['likes.nolike', $place->id], 'method' => 'delete']) !!}
            {!! Form::submit('行ってみたい解除', ['class' => "btn btn-warning btn-primary"]) !!}
        {!! Form::close() !!}
@else
        {!! Form::open(['route' => ['likes.like', $place->id]]) !!}
            {!! Form::submit('行ってみたい', ['class' => "btn btn-success btn-primary"]) !!}
        {!! Form::close() !!}
@endif