@extends('layout.master')
@section('style')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 94%;
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
        function initMap() {
            var latlng = { lat: 25.046891, lng: 121.516602 }; // 給一個初始位置
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14, //放大的倍率
                center: latlng //初始化的地圖中心位置
            });
            var marker = new google.maps.Marker({
                position: latlng,
                map: map
            });
            if (navigator.geolocation) {
                var watchID = navigator.geolocation.watchPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    console.log(pos)
                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map
                    });
                    //map.setZoom(14);
                    map.setCenter(pos);
                });
            } else {
                // Browser doesn't support Geolocation
                alert("未允許或遭遇錯誤！");
            }



        } //init_end
        /*
$(function(){
  $.ajax({
  //url: "https://randomuser.me/api",
  url: "{{ url('storage/json/test.json') }}",
  type: "GET",
  dataType: "json",
  headers: {

'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

},

  success: function(Jdata) {
    alert("SUCCESS!!!");
    console.log('success');
  },

  error: function() {
    alert("ERROR!!!");
    console.log(arguments);
  }
});


})

*/


        


        </script>






@endsection

