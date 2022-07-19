<nav class="navbar navbar-expand-lg shadow-sm fixed-top">
    <a href="/" class="navbar-brand"><img src="../img/home/logo.gif" alt="弓道場のTEBIKIのロゴ" style="height:55px;"></a>
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
            <!--弓道場のTEBIKI説明-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.about')}}"><i class="fa-solid fa-book-open-reader"></i>弓道場のTEBIKIとは？</a>
            </li>
            <!--新規弓道場登録-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('dojos.create')}}"><i class="fa-solid fa-bullseye"></i>弓道場登録</a>
            </li>
            <!--マイページ-->
            <li class="nav-item">
                
                <a class="nav-link" href="{{route('mypage')}}"><i class="fa-solid fa-image-portrait"></i>マイページ</a>
            </li>
            <!--ログアウト-->
            <li class="nav-item">
                
                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i>ログアウト</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>
            
        <!--未ログイン-->
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.about')}}"><i class="fa-solid fa-book-open-reader"></i>弓道場のTEBIKIとは？</a>
            </li>
            <!--新規登録-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}"><i class="fa-solid fa-person-rays"></i>新規登録</a>
            </li>
            <!--ログイン-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}"><i class="fa-solid fa-person-chalkboard"></i>ログイン</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>