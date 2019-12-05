<?php use App\Place; ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>OWN-PLACES</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('/css/placelist.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>
    
    <body>
        @include('commons.navbar')
        @include('commons.error_messages')
        
        <div class="text-center">
            <h1>{{ $place->title }}</h1>
        </div>
            <div class="row">
                <div class="col-md-6"><img src="{{ $place->picture_path }}" class="d-block mx-auto" max-width="700" max-height="1000"></div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thread>
                            <tr>
                                <th>紹介文</th>
                            </tr>
                        </thread>
                        <tbody>
                            <tr>
                                <td>{{ $place->content }}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    @if (Auth::check())
                        <div class="row">
                            <div class="col-md-3">@include('place.likebutton', ['id' => $place->id])</div>
                        </div>
                    @endif
                    <div class="text-center">
                            <h3>マップ</h3>
                        </div>
                    <div class="row">
                        <div id="map" lat="{{ $place->lat }}" lng="{{ $place->lng }}" style="width:700px; height:220px"></div>
                    </div>
                     @if (Auth::id() == Place::find($place->id)->user->id)
                        <div class="col-md-3">{!! link_to_route('places.edit', '投稿を編集', ['id' => $place->id], ['class' => 'btn btn-primary']) !!}</div>
                     @endif
                </div>
            </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBT4HMf1Vh0UTo-NI8pKi57vBKcyASWp6o&callback=initMap" async defer></script>
        <script>
                function initMap() {
                    var map;
                    var marker;
                    var lat = document.getElementById( 'map' ).getAttribute( 'lat' );
                    var lng = document.getElementById( 'map' ).getAttribute( 'lng' );
                    var latlng = new google.maps.LatLng(lat, lng);
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: latlng,
                        zoom: 16
                    });
                    
                    marker = new google.maps.Marker({
                        position: latlng,
                        map: map
                    });
                }
                                
                window.onload = function () {
                    initMap();
                }
        </script>
    
    </body>
</html>