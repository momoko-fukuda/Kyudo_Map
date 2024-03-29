<!--★トップ画面-->
@extends('layouts.app')


@section('content')

<!--メインビジュアル-->
<div id="mainvisual">
    <div id="mainmessage">
        <h1>ようこそ、<br><strong>弓道場のTEBIKI</strong>へ</h1>
        <h4>~みんなで弓道場をもっと身近に~</h4>
    </div>
    <div class="map flex-grow-1">
        <ul id="mainmap">
            <p>
                練習のできる弓道場を探そう！
                <br>知っている弓道場を共有しよう！
            </p>
            <li id="area1">
                    <dt class="area">北海道</dt>
                    <dd>
                        <a href="/dojos?area_id=1">北海道</a>
                            
                    </dd>
            </li>
            <li id="area2">
                    <dt class="area">東北</dt>
                    <dd>
                        <a href="/dojos?area_id=2">青森</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=3">岩手</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=5">秋田</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=6">山形</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=4">宮城</a>
                    </dd>
                    　<dd>
                    　  <a href="/dojos?area_id=7">福島</a>
                    　</dd>
            </li>
            <li id="area3">
                    <dt class="area">関東</dt>
    
                    <dd>
                        <a href="/dojos?area_id=10">群馬</a>
                    </dd>
                      <dd>
                        <a href="/dojos?area_id=9">栃木</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=8">茨城</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=11">埼玉</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=14">神奈川</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=13">東京</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=12">千葉</a>
                    </dd>
            </li>
            <li id="area4">
                <dt class="area">甲信越・北陸</dt>
                <dd>
                    <a href="/dojos?area_id=16">富山</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=17">石川</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=15">新潟</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=18">福井</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=20">長野</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=19">山梨</a>
                </dd>
            </li>
            <li id="area5">
                <dt class="area">東海</dt>
                <dd>
                    <a href="/dojos?area_id=21">岐阜</a>
                </dd>
                <dd>
                <a href="/dojos?area_id=22">静岡</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=24">三重</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=23">愛知</a>
                </dd>
            </li>
            <li id="area6">
                <dt class="area">近畿</dt>
                <dd>
                    <a href="/dojos?area_id=26">京都</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=25">滋賀</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=27">大阪</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=29">奈良</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=28">兵庫</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=30">和歌山</a>
                </dd>
            </li>
            <li id="area7">
                <dt class="area">中国</dt>
                <dd>
                    <a href="/dojos?area_id=32">島根</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=34">広島</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=35">山口</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=31">鳥取</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=33">岡山</a>
                </dd>
            </li>
            <li id="area8">
                <dt class="area">四国</dt>
                <dd>
                    <a href="/dojos?area_id=38">愛媛</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=37">香川</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=39">高知</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=36">徳島</a>
                </dd>
            </li>
            <li id="area9">
                <dt class="area">九州・沖縄</dt>
                <dd>
                    <a href="/dojos?area_id=40">福岡</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=41">佐賀</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=42">長崎</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=43">熊本</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=44">大分</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=45">宮崎</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=46">鹿児島</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=47">沖縄</a>
                </dd>
            </li>
        </ul>
    </div>
</div>

<hr>
<div id="kyudo_about">
    <h3>弓道場のTEBIKIって何ができるの？</h3>
    <img src="../../images/kyudo_about.png" alt="弓道のTEBIKIとは？">
    <div>
        <a href="{{route('home.about')}}" class="btn btn_about" role="button" >
            説明を見に行く
            <i class="fa-solid fa-book-open-reader"></i>
        </a>
        @auth
            <a href="{{route('dojos.index')}}" 
               class="btn btn_search" 
               role="button" >
                弓道場を探しにいく
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
        @else
            <a href="{{route('register')}}" 
               class="btn btn_search" 
               role="button" >
                新規会員登録をする
                <i class="fa-solid fa-person-rays"></i>
            </a>
        @endauth
    </div>
</div>

    <!--運営からのお知らせ部分（適宜追加）-->
<div id="news">
    <h3>弓道場のTEBIKIからのNews</h3>
    <ul>
        <li>
            <a href="{{route('home.about')}}">
                <i class="fa-solid fa-bullseye"></i>
                弓道場のTEBIKIがサービス開始
            </a>
        </li>
        <li>
            <i class="fa-solid fa-bullseye"></i>
            関東・関西地域の弓道場をアップしました。
        </li>
    </ul>
</div>


<!--レビュー表示部分-->
<div id="reviews">
    <img src="../../images/kyudo_review.png" id="usagi">
    <h3>弓道場に関する最新口コミ</h3>
    
    <div>
        @if($reviews->isNotEmpty())
            @foreach($reviews as $review)
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('dojos.show', $review->dojo->id)}}" 
                           class="card-link">
                            <i class="fa-solid fa-vihara"></i>
                            <strong>{{ $review->dojo->name }}</strong>
                        </a>
                    </div>
                    <div class="card-body">
                        @if($review->user)
                            <span class="card-subtitle d-block mb-2">
                                <i class="fa-solid fa-person-circle-check"></i>
                                {{$review->user->name}}  
                            </span>
                        @else
                            <span class="card-subtitle d-block mb-2">
                                <i class="fa-solid fa-person-circle-minus"></i>
                                退会済  
                                </span>
                        @endif
                        <h5 class="card-title">{{$review->title}}</h5>
                        <hr>
                        
                        <p class="card-text">{{$review->body}}</p>
                        
                        
                        
                        
                        @auth
                            <!--いいねしてない時-->
                            @if(!$review->isLikedBy(Auth::user()))
                                <a class="likes mr-2">
                                    <i class="fa-regular 
                                              fa-thumbs-up 
                                              like-toggle" 
                                       data-review-id="{{$review->id}}">
                                    </i>
                                    <span class="like-counter">
                                        {{$review->reviewbuttons_count}}
                                    </span>
                                </a>
                                <span>|</span>
                            <!--いいねしている時-->
                            @else
                                <a class="likes mr-2">
                                    <i class="fa-regular 
                                              fa-thumbs-up 
                                              like-toggle liked" 
                                        data-review-id="{{$review->id}}">
                                    </i>
                                    <span class="like-counter">
                                        {{$review->reviewbuttons_count}}
                                    </span>
                                </a>
                                <span>|</span>
                            @endif
                        @endauth
                        @guest
                            <a class="likes mr-2" href="{{route('login')}}">
                                <i class="fa-regular
                                          fa-thumbs-up">
                                    </i>
                                    <span class="like-counter">
                                        {{$review->reviewbuttons_count}}
                                    </span>
                            </a>
                            <span>|</span>
                        @endguest
                        
                        
                        <a href="{{route('reviews.index', $review->dojo->id)}}"
                           class="mr-2">
                            <span>
                                <i class="fa-solid fa-images"></i>
                                {{$review->dojophotos->count()}}
                            </span>
                        </a>
                        <span>|</span>
                        <a href="{{route('home.contact')}}">
                            <span>
                                <i class="fa-solid fa-ghost"></i>
                                <small>違反報告</small>
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <p class="w-75 mt-4 text-center">ごめんなさい、まだ口コミは投稿されてません。</p>
            <img src="../images/sorry.gif">
            <a class="btn btn_check" href="{{route('dojos.index')}}">
                知っている弓道場を探しにいく
            </a>
         @endif
    </div>
</div>

@endsection
