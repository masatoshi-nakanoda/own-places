<header class="mb-4">
    <nav  class="navbar navbar-expand-sm navbar-dark" style="background-color:#32cd32;">
        <a class="navbar-brand" href="/">OWN-PLACES</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto">
                <li>{!! link_to_route('places.all', '投稿一覧', [], ['class' => 'nav-link']) !!}</li>
            </ul>
            <ul class="nav navbar-nav">
                @if (Auth::check())
                    <li class="nav-item"><a href="/home" class="nav-link">ホーム</a></li>
                    <li>{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                @else
                    <li>{!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>