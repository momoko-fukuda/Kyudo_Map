<!--★トップ画面-->
@extends('layouts.app')


@section('content')

<!--メインビジュアル-->
<div id="main"　class="d-flex flex-row">
    <div>
        @auth
        <h1>ようこそ！{{$user->name}}さん<br>弓道場のTEBIKIへ</h1>
        @else
        <h1>ようこそ、弓道場のTEBIKIへ</h1>
        @endauth
        <h2>みんなで弓道場をもっと身近に</h2>
        <a href="{{route('home.about')}}" class="btn btn-secondary" role="button" >弓道場のTEBIKIとは？</a><br>
        @auth
        <a href="{{route('dojos.index')}}">弓道場を探そう！＞</a>
        @else
        <a href="{{route('register')}}">新規会員登録はこちら＞</a>
        @endauth
    </div>
    <div>
        <p>練習のできる弓道場を探そう！</p>
        <ul>
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
                </dl>
            </li>
            <li id="area3">
                <dl>
                    <dt>関東</dt>
    
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
                </dl>
            </li>
            <li id="area4">
                <dt>甲信越・北陸</dt>
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
                <dt>東海</dt>
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
                <dt>近畿</dt>
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
                <dt>中国</dt>
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
                <dt>四国</dt>
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
                <dt>九州・沖縄</dt>
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
<div>
    <h3>弓道場に関する口コミ</h3>
    <div>
        @foreach($reviews as $review)
            <div class="card" style="width:50rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$review->title}}</h5>
                    <h6 class="card-subtitle">{{$review->user->name}}</h6>
                    <p class="card-text">{{$review->body}}</p>
                    <a href="{{route('reviews.index', $review->dojo->id)}}" class="card-link">{{ $review->dojo->name }}の口コミ一覧をみる</a>
                </div>
                    <span>参考になった数：{{$review->favorites->count()}}</span>
            </div>
        @endforeach
     </div>
     <a href="{{route('dojos.index')}}">利用した弓道場を探して、みんなに情報共有しよう！＞</a>
</div>

@endsection