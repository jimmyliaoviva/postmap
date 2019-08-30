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
        //set infowindow content
        function setInfo(){
            var markerInfo = '<button type="button" href="{{  }}" class="btn btn-primary btn-sm">投信去</button>';

            return markerInfo;
        }
        function linkToWebsite(data){
            var website = '';
            if (data.Website == ''){
                return '<a class="btn " href="#" role="button">'+data.Name+'</a>'
            }
            else{
                return '<a class="btn" target="_blank" href="'+data.Website+'" role="button">' + data.Name+'</a>'
            }
        }


        function initMap() {

            var latlng = { lat: 25.046891, lng: 121.516602 }; // 給一個初始位置
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14, //放大的倍率
                center: latlng //初始化的地圖中心位置
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

            $.ajax({
            //url: "https://randomuser.me/api",
            //url: "{{ url('storage/json/scenic_spot.json') }}",
            //url: "http://localhost/storage/json/scenic.json",
            url: "{{ url('storage/json/test.json') }}",
            type: "GET",
            dataType: "json",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },

            success: function(Jdata) {
            //alert("SUCCESS!!!");
            console.log('success');

            for (let index = 0; index < Jdata.length; index++) {
                console.log( Jdata[index].Id,index);
                var latlnge = { lat:  Jdata[index].Py, lng: Jdata[index].Px };
                console.log(latlnge)
                var infowindow = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                position: latlnge,
                icon: "{{ url('storage/poo.png') }}",
                map: map
            });
                marker.addListener('click', function() {
                infowindow.setContent(   linkToWebsite(Jdata[index])  +
                 '</br>' +setInfo()
                );
                infowindow.open(map, this);
            });//end marker listener
            }//end for
            },//end success
            error: function() {
            alert("ERROR!!!");
            console.log(arguments);
            }
            });

        } //init_end
/*
$(function(){
  $.ajax({
  //url: "https://randomuser.me/api",
  //url: "{{ url('storage/json/scenic_spot.json') }}",
  //url : "https://gis.taiwan.net.tw/XMLReleaseALL_public/scenic_spot_C_f.json"
  type: "GET",
  dataType: "jsonp",
  cache: false,
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

