<nav class="navbar navbar-expand-lg" style="background-color: #cfb53b;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('post.enteringGame') }}">金色絲路</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('post.index') }}">遊戲背景</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.gameRule') }}">遊戲規則</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.gameDevelopment') }}">遊戲開發介紹</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        使用者
                    </a>
                    <ul class="dropdown-menu">
                        @if (Auth::check())
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}">登出</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('user.signup') }}">註冊</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.signin') }}">登入</a></li>
                            <li>
                        @endif

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
