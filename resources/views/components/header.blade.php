<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/images/logo-1.png" style="height: 39px;" alt="Melpit">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <form class="form-inline">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select class="custom-select">
                                <option selected>全て</option>
                                <option value="0" class="font-weight-bold">カテゴリ１</option>
                                <option value="1">　カテゴリ２</option>
                                <option value="2">カテゴリ３</option>
                                <option value="3">カテゴリ４</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-dark">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="btn btn-secondary ml-3" href="{{ route('register') }}" role="button">会員登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-info ml-2" href="{{ route('login') }}" role="button">ログイン</a>
                    </li>
                @else
                    <li class="nav-item dropdown ml-2">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (!empty($user->avatar_file_name))
                                <img src="/storage/avatars/{{$user->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
                            @else
                                <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
                            @endif
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <div class="dropdown-item-text">
                                <div class="row">
                                    <div class="col">売上金</div>
                                    <div class="col-auto">￥0</div>
                                </div>
                            </div>
                            <div class="dropdown-item-text">
                                <div class="row">
                                    <div class="col">出品数</div>
                                    <div class="col-auto">0 個</div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('sell') }}">
                                <i class="fas fa-camera text-left" style="width: 30px"></i>商品を出品する
                            </a>
                            <a class="dropdown-item" href="{{ route('mypage.sold-items') }}">
                                <i class="fas fa-store-alt text-left" style="width: 30px"></i>出品した商品
                            </a>
                            <a class="dropdown-item" href="{{ route('mypage.bought-items') }}">
                                <i class="fas fa-shopping-bag text-left" style="width: 30px"></i>購入した商品
                            </a>
                            <a class="dropdown-item" href="{{ route('mypage.edit-profile') }}">
                                <i class="far fa-address-card text-left" style="width: 30px"></i>プロフィール編集
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt text-left" style="width: 30px"></i>ログアウト
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
