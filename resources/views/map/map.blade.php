<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Map</title>
        <style>
            #target {
                width: 550px;
                height: 220px;
            }
        </style>
    </head>
    <body>
        <div id="target"></div>
        <input type="text" id="address">
        <button id="searh">検索</button>
        <br>住所もしくは具体的な場所の名前（お店名、建物名の名前等）を入力して検索で表示された<br>
            緯度（lat）,経度(lng)をフォームに入力してください。
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBT4HMf1Vh0UTo-NI8pKi57vBKcyASWp6o&language&callback=initMap" async defer></script>
        <script>
            function initMap(){
                'use strict';
                
                var target=document.getElementById('target');
                var map;
                var geocoder = new google.maps.Geocoder();
                
                document.getElementById('searh').addEventListener('click', function(){
                    geocoder.geocode({
                       address: document.getElementById('address').value
                    }, function(results, status){
                       if(status !== 'OK'){
                           alert('Failed: ' +status);
                           return;
                       }
                       
                       if(results[0]){
                            var map = new google.maps.Map(target, {
                                center: results[0].geometry.location,
                                zoom: 18
                            });
                           
                            var address = results[0].formatted_address.replace(/^日本, /, '');
                           
                            new google.maps.InfoWindow({
                                content: address + "<br>(Lat, Lng) = " + results[0].geometry.location.toString()
                                }).open(map, new google.maps.Marker({
                                position: results[0].geometry.location,
                                map: map
                                }));
                            
                            marker.addListener('click', function(){
                                infoWindow.open(map, marker);
                            });
                            
                       }else{
                           alert('No');
                           return;
                       }

                   });
                   
                });
                
            }
        </script>
    </body>
</html>