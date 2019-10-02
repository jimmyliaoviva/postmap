
@extends('layout.master')
@section('title')
    {{$card->spotName}}
@endsection

@section('content' )
<div>
        <div class="card mx-auto img-fluid" >
            <img src="{{$card->imgPath}}" class="img-fluid mx-auto" alt="Responsive image">
        </div>
    <p class="text-center">{{$card->content}}</p>

    <p class="text-center">{{$card->spotName}}</p>

</div>


@endsection
