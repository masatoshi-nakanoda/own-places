<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
        
        {!! link_to_route('users.delete', 'アカウントを削除する', ['id' => $user->id]) !!}
    </div>
    <div class="card-body">
        <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt=""> 
    </div>
</div>