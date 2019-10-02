@extends('layout.master')
@section('title')
    Mycard
@endsection
@section('content')

<div class="card-deck row p-3 ">
    @foreach ($cards as $card)
    <div class=" col-sm-6 col-md-3">
            <div class="card" >
                <img src="{{ $card->imgPath }}" class="card-img-top" alt="..." >
                <div class="card-body ">
                  <h5 class="card-title">{{ $card->spotName }}</h5>
                  <p class="card-text">{{ $card->updated_at }}</p>
                <a href="{{ route('postcard.card', ['card'=>$card->id]) }}" class="btn btn-primary pull-right">詳細</a>
                </div>
            </div>
    </div>
    @endforeach
</div>


@endsection
