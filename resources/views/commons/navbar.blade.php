<header class="mb-4">
    <nav  class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">OWN-PLACES</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-togglericon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="nav navbar-nav">
                @if (Auth::check())
                    <li class="nav-item"><a href="#" class="nav-link">ユーザページ</a></li>
                    <li>{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                @else
                    <li>{!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>