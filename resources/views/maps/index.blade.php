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
@section('title')
  Collectter
@endsection
@section('content')

    <div id="map"></div>




    <script>


        //set infowindow content
        function setInfo(data){
            var spotName = data.Name;
            var markerInfo = '<a class="btn btn-primary" href="{{route('postcard.writecard',['spotName' => '秀峰瀑布'] )}}"  role="button">投信去</a>' +
            '<a class="btn btn-primary" href="{{route('postcard.mailbox')}}" role="button">收信去</a>';

            return markerInfo;
        }
        function linkToWebsite(website,name){

            if (website == ''){
                return '<a class="btn " href="#" role="button">'+name+'</a>'
            }
            else{
                return '<a class="btn" target="_blank" href="'+website+'" role="button">' + name+'</a>'
            }
        }//end linkToWebsite



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
            @foreach($spots as $spot)
            var infowindow = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                position:{lat :{{$spot->Py}}, lng: {{$spot->Px}}},
                icon: "{{ url('storage/img/postbox.png') }}",
                map: map
            });
                marker.addListener('click', function() {
                infowindow.setContent(   linkToWebsite('{{$spot->Website}}','{{$spot->Name}}')  +
                 '</br>' +
                 '<a class="btn btn-primary" href="{{route('postcard.writecard',['spotName' => $spot->Name] )}}"  role="button">投信去</a>' +
                 '<a class="btn btn-primary" href="{{route('postcard.mailbox')}}" role="button">收信去</a>'
                );
                infowindow.open(map, this);
            });//end marker listener
            @endforeach
/*
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
                icon: "{{ url('storage/img/poo.png') }}",
                map: map
            });
                marker.addListener('click', function() {
                infowindow.setContent(   linkToWebsite(Jdata[index])  +
                 '</br>' +setInfo(Jdata[index])
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

*/

        } //init_end


        </script>





@endsection

