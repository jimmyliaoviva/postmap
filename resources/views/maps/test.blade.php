@extends('layout.master')
@section('style')
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
@endsection

@section('content')




    <div id="map"></div>
    <script>
     var map, marker, lat, lng;

      function initMap() {

        var watch = navigator.geolocation.watchPosition(function(position){
            console.log(position.coords)
            map = new google.maps.Map(document.getElementById('map'), {

center: {lat:position.coords.latitude , lng: position.coords.longitude},
zoom: 18
});
        })


      }
    </script>

 @endsection

