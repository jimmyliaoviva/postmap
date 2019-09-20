@extends('layout.master')
@section('content')
<div class="row p-3">
    <div class="col-md-4 col-md-offset-4"></div>
    <h1>登入</h1>
    @if (count($errors)>0)
        <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
        </div>
    @endif
    <div class="container">
    <form action="{{ route('user.signin') }}" method="POST">
            <div class="form-group ">
                <label for="email">E-Mail</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">登入</button>
        <a class="btn sm" href="{{route('user.signup')}}" role="button">還沒註冊？</a>
            {{ csrf_field() }}
        </form>

    </div>
</div>
 @endsection
