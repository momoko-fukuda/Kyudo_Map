<!--★トップ画面-->
@extends('layouts.app')


@section('content')

<!--メインビジュアル-->
<div id="mainvisual"　class="d-flex">
    <div id="mainmessage">
        <h1>ようこそ、<br><strong>弓道場のTEBIKI</strong>へ</h1>
        <h4>~みんなで弓道場をもっと身近に~</h4>
    </div>
    <div class="flex-grow-1">
        <ul id="mainmap">
            <p>練習のできる弓道場を探そう！<br>知っている弓道場を共有しよう！</p>
            <li id="area1">
                <dl>
                    <dt>北海道</dt>
                    <dd>
                        <a href="/dojos?area_id=1">北海道</a>
                            
                    </dd>
                </dl>
            </li>
            <li id="area2">
                <dl>
                    <dt>東北</dt>
    
                    <dd>
                        <a href="/dojos?area_id=2">青森|</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=3">岩手|</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=5">秋田</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=6">山形|</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=4">宮城|</a>
                    </dd>
                    　<dd>
                    　  <a href="/dojos?area_id=7">福島</a>
                    　</dd>
                </dl>
            </li>
            <li id="area3">
                <dl>
                    <dt>関東</dt>
    
                    <dd>
                        <a href="/dojos?area_id=10">群馬|</a>
                    </dd>
                      <dd>
                        <a href="/dojos?area_id=9">栃木|</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=8">茨城|</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=11">埼玉</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=14">神奈川|</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=13">東京|</a>
                    </dd>
                    <dd>
                        <a href="/dojos?area_id=12">千葉</a>
                    </dd>
                </dl>
            </li>
            <li id="area4">
                <dt>甲信越・北陸</dt>
                <dd>
                    <a href="/dojos?area_id=16">富山|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=17">石川|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=15">新潟</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=18">福井|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=20">長野|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=19">山梨</a>
                </dd>
            </li>
            <li id="area5">
                <dt>東海</dt>
                <dd>
                    <a href="/dojos?area_id=21">岐阜|</a>
                </dd>
                <dd>
                <a href="/dojos?area_id=22">静岡</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=24">三重|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=23">愛知</a>
                </dd>
            </li>
            <li id="area6">
                <dt>近畿</dt>
                <dd>
                    <a href="/dojos?area_id=26">京都|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=25">滋賀|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=27">大阪</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=29">奈良|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=28">兵庫|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=30">和歌山</a>
                </dd>
            </li>
            <li id="area7">
                <dt>中国</dt>
                <dd>
                    <a href="/dojos?area_id=32">島根|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=34">広島|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=35">山口</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=31">鳥取|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=33">岡山</a>
                </dd>
            </li>
            <li id="area8">
                <dt>四国</dt>
                <dd>
                    <a href="/dojos?area_id=38">愛媛|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=37">香川|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=39">高知|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=36">徳島</a>
                </dd>
            </li>
            <li id="area9">
                <dt>九州・沖縄</dt>
                <dd>
                    <a href="/dojos?area_id=40">福岡|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=41">佐賀|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=42">長崎|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=43">熊本</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=44">大分|</a>
                </dd>
                <dd>
                    <a href="/dojos?area_id=45">宮崎|</a>
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
    <img src="../img/home/kyudo_about.png">
    <div>
        <a href="{{route('home.about')}}" class="btn btn-success" role="button" >説明を見に行く<i class="fa-solid fa-book-open-reader"></i></a>
        @auth
            <a href="{{route('dojos.index')}}" class="btn btn-warning" role="button" >弓道場を探しにいく<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        @else
            <a href="{{route('register')}}" class="btn btn-warning" role="button" >新規会員登録をする<i class="fa-solid fa-chevrons-right"></i></a>
        @endauth
    </div>
</div>

    <!--運営からのお知らせ部分（適宜追加）-->
<div id="news">
    <h3>弓道場のTEBIKIからのNews</h3>
    <ul>
        <li>
            <a href="{{route('home.about')}}">弓道場のTEBIKIがサービス開始</a>
        </li>
    </ul>
</div>


<!--レビュー表示部分-->
<div id="reviews">
    <img src="../img/home/kyudo_review.png" style="width:100px; height:auto;">
    <h3 style="display:inline;">弓道場に関する口コミ</h3>
    
    <div>
        @if($reviews->isNotEmpty())
            @foreach($reviews as $review)
                <div class="card border-warning" style="width:500px; margin:10px auto;">
                    <div class="card-header">
                        <a href="{{route('dojos.show', $review->dojo->id)}}" class="card-link"><i class="fa-solid fa-vihara"></i>{{ $review->dojo->name }}</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$review->title}}</h5>
                        <hr>
                        <p class="card-text">{{$review->body}}</p>
                        
                        @if($review->user)
                            <span class="card-subtitle"><i class="fa-solid fa-person-circle-check"></i>{{$review->user->name}} | </span>
                            <span><i class="fa-solid fa-thumbs-up"></i>{{$review->favorites->count()}} | </span>
                            <a href="{{route('reviews.index', $review->dojo->id)}}"><i class="fa-solid fa-images"></i>{{$review->dojophotos->count()}}</a>
                        @else
                            <span class="card-subtitle"><i class="fa-solid fa-person-circle-minus"></i>退会済 | </span>
                            <span><i class="fa-solid fa-thumbs-up"></i>{{$review->favorites->count()}} | </span>
                            <a href="{{route('reviews.index', $review->dojo->id)}}"><i class="fa-solid fa-images"></i>{{$review->dojophotos->count()}}</a>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>ごめんなさい、まだ口コミは投稿されてません。</p>
            <a href="{{route('dojos.index')}}">知っている弓道場を探して、口コミを投稿する</a>
            <img src="../img/home/kyudo_review.png">
        @endif
     </div>
</div>

@endsection