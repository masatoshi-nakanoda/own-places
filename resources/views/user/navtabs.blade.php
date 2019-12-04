<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('places.index', ['id' => $user->id]) }}" class="nav-link">投稿一覧</a></li>
    <li class="nav-item"><a href="{{ route('users.likes', ['id' => $user->id]) }}" class="nav-link {{ Request::is('/home/*/likes') ? 'active' : '' }}">行ってみたい</a></li>
</ul>