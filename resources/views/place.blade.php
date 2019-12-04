<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>OWN-PLACES</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>
    
    <body>
        @include('commons.navbar')
        @include('commons.error_messages')
         @if(count($places) > 0)
            <table class="table">
                <thread>
                    <tr>
                        <th>投稿日時</th>
                        <th>投稿タイトル</th>
                    </tr>
                </thread>
                <tbody>
                    @foreach($places as $place)
                        <tr>
                            <td>{{ $place->created_at }}</td>
                            <td><a href="{{ route('places.show', ['id' => $place->id]) }}">{{ $place->title }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center">
                <h1>投稿はまだありません。/h1>
            </div>
        @endif
        
         {{ $places->links('pagination::bootstrap-4') }}
            
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>