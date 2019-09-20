
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="{{route('maps.index')}}">
            <img src="{{ url('storage/img/Title.png') }}"  class="img-fluid" height="100%" width="80" id="logo" alt="Responsive image"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="{{route('maps.index')}}">首頁 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('postcard.mycard')}}">我的收集</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>帳號</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if(Auth::check())
              <a class="dropdown-item" href="{{route('user.logout')}}">登出</a>
              <a class="dropdown-item" href="{{route('postcard.mycard')}}">我的收集</a>
              @else
              <a class="dropdown-item" href="{{route('user.signup')}}">註冊</a>
              <a class="dropdown-item" href="{{route('user.signin')}}">登入</a>
              @endif

            <div class="dropdown-divider"></div>

          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
