<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>OWN-PLACES</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
    </head>
    
    <body>
        
        @include('commons.navbar')
        @include('commons.error_messages')

        <div class="top">
            
            <div class="text-center">
                <h1>OWN-PLACES</h1>
                <h2>あなたが好きなお店や場所を誰かに紹介したり、<br>
                    自分の知らない誰かのお気に入りのお店や場所に行ってみませんか？<br>
                </h2>
                <br><br>
                <h3>どの様な投稿がされているかこちらから見れます→{!! link_to_route('places.all', '投稿一覧へ', [], []) !!}</h3>
                <br>
                <h4>投稿は下記ユーザ登録ボタンよりユーザ登録の上実施できます。</h4>
                <br>
                {!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
    <footer>
    </footer>
</html>