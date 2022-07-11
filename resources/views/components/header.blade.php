<nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-sm fixed-top">
    <a href="/" class="navbar-brand">弓道場のTEBIKI</a>
    <button 
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navmenu"
        aria-controls="navmenu"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ml-auto">
        <!--ログイン時-->
            @auth
            <!--新規弓道場登録-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('dojos.create')}}">弓道場登録</a>
            </li>
            <!--マイページ-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('mypage')}}">マイページ</a>
            </li>
            <!--ログアウト-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>
            
        <!--未ログイン-->
            @else
            <!--新規登録-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">新規登録</a>
            </li>
            <!--ログイン-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">ログイン</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>