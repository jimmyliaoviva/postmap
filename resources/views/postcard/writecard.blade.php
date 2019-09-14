
@extends('layout.master')
@section('title')
    Postcard
@endsection
@section('style')
<style>
.map-container-5{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
    }
    .map-container-5 iframe{
    left:0;
    top:0;
    height:50%;
    width:50%;
    position:absolute;
    }
.card{
    padding-bottom:56.25%;
    height:50%;
    width:50%;
    position: relative;
}

#map{
    height: 100%;
    width: 100%;
   position: absolute;
}
    </style>

@endsection
@section('content' )
<div class="card w-75  mx-auto">
        <div class="card-body " id="map">

        </div>
      </div>
<div class="card-body card-body-cascade text-center">






  <form>
    <div class="form-group">
      <label for="exampleFormControlInput1">Email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">選擇郵筒</label>
      <select class="form-control" id="exampleFormControlSelect1">
        @foreach ($spots as $item)
        @if($item->Name==$thisBox->Name)
      <option selected="true">{{$item->Name}}</option>
        @else
      <option>{{$item->Name}}</option>
        @endif
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">寫下你想說的話</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="4">{{$thisBox->Name}}</textarea>
    </div>
    <div class="form-group file-loading">
            <label for="exampleFormControlFile1">選擇照片</label>
            <input id="input-b1" name="input-b1" type="file" class="file" data-browse-on-zone-click="true">
            <script>
                $(function () {
                    $("#input-b1").fileinput({
                    uploadUrl: "/file-upload-batch/2",
                    autoReplace: true,
                    maxFileCount: 1,
                    allowedFileExtensions: ["jpg", "png", "gif"]
                });
                })
                </script>
        </div>

  </form>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>



<script>
        function initMap() {

var latlng = { lat: 25.046891, lng: 121.516602 }; // 給一個初始位置
var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 14, //放大的倍率
  center: latlng //初始化的地圖中心位置
});
map.setCenter({ lat:{{$thisBox->Py}}, lng: {{$thisBox->Px}} });
var marker = new google.maps.Marker({
                position:{lat :{{$thisBox->Py}}, lng: {{$thisBox->Px}}},
                icon: "{{ url('storage/img/postbox.png') }}",
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
}}


        </script>

@endsection
