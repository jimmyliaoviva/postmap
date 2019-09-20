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

    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">


    <a href="{{route('postcard.mycard')}}" class="btn">  <img src="{{url('storage/img/envelop.png')}}" >
</a>


    </div>
  </div>



    <script>
        function receiveMail(){
            console.log('hihi');
        }//end receiveMail

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
                 '<a class="btn btn-primary" href="{{route('postcard.mailbox', ['spotName' => $spot->Name] )}}" role="button">收信去</a>' +'</br>'+
                 '<!-- Button trigger modal -->' +
                 '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> Launch </button>'
                );
                infowindow.open(map, this);
            });//end marker listener
            @endforeach

        } //init_end


        </script>





@endsection

