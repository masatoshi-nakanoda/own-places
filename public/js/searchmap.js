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
    window.onload = function () {
    initMap();
}