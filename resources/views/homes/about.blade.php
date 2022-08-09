<!--★弓道場のTEBIKIとは？の画面（アプリの説明）-->

@extends('layouts.app')

@section('content')

<div>
    <!--トップ-->
    <div id="aboutview">
        <h1>弓道場のTEBIKI</h1>
        <h4>それは、弓道が練習できる場をみんなで見つけ・共有し、
            <br>
            <span>弓道をもっと身近に楽しく続けていくための<br>弓道場の手引書</span>
            です。
        </h4>
    </div>
    <!--お悩み-->
    <div id="aboutworry">
        <h4>弓道経験者の方々、こんなお悩みありませんか？</h4>
        <div>
            <div class="worries">
                <img src="../../images/worries1.png" 
                     alt="練習場が見つけづらい">
                <p>
                    個人練習する場所を探すのに<br>いつも手間がかかっている。
                    <br>この間、練習しに行った弓道場を忘れる。
                </p>
            </div>
            <div class="worries reverse">
                <p>
                    練習をしに弓道場にいったものの、<br>様々な条件があり、
                    <br>結局個人練習できなかった。
                </p>
                <img src="../../images/worries2.png" 
                     alt="練習できなかった">
            </div>
            <div class="worries">
                <img src="../../images/worries3.png" 
                     alt="練習場の管理">
                <p>
                    個人的に弓道を続けたいが、<br>転勤やライフイベントでの引っ越しで
                    <br>どこの弓道場で練習できるのかわからず続けづらい。
                </p>
            </div>
        </div>
    </div>
    <!--解決策-->
    <div id="solution">
        <h4>そんなあたなに、弓道場のTEBIKIです</h4>
        <p>
            弓道場のTEBIKIは、
            <strong>弓道を続ける上での練習場所に悩みを持つ</strong>
            あなたを助ける機能があります
        </p>
        <div>
            <div>
                <img src="../../images/kyudoabout1.png" alt="弓道場の検索">
            </div>
            <div>
                <img src="../../images/kyudoabout2.png" alt="弓道場の共有">
            </div>
            <div>
                <img src="../../images/kyudoabout3.png" alt="弓道場の管理">
            </div>
        </div>
    </div>
    <!--何ができるのか-->
    <div id="howtouse">
        <h4>弓道場のTEBIKIの利用方法</h4>
        <div>
            <div>
                <p class="usetop">
                    <span>シーン１：</span>
                    どこの弓道場で練習できるかわからない
                </p>
                <p>
                    道場検索画面より弓道場を検索できます。
                    <br>各弓道場ページに詳細情報が記載してあります。
                </p>
                <a type="button" 
                   class="btn btn_check" 
                   href="{{route('dojos.index')}}">
                    弓道場を探しにいく
                </a>
            </div>
            <div>
                <p class="usetop">
                    <span>シーン２：</span>
                    あれ、あの道場でも練習できるのに登録がない…
                </p>
                <p>
                    弓道場のTEBIKIに登録のない弓道場を、登録して共有が可能です。
                    <br>また、登録済の弓道場情報を編集し、知っている情報を共有することもできます。
                </p>
                <a type="button" 
                   class="btn btn_check" 
                   href="{{route('dojos.create')}}">
                    弓道場を登録する
                </a>
            </div>
            <div>
                <p class="usetop">
                    <span>シーン３：</span>
                    あ、この弓道場利用したことあるな…
                </p>
                <p>
                    弓道場の雰囲気など、口コミ・写真を投稿して、みんなに共有することが可能です。
                    <br>また、他の人が投稿した口コミ・写真から、その道場の様子が確認できます。
                </p>
                <a type="button" 
                   class="btn btn_check" 
                   href="{{route('dojos.index')}}">
                    弓道場を検索して<br>口コミ・写真を見に行く
                </a>
            </div>
            <div>
                <p class="usetop">
                    <span>シーン４：</span>
                    利用した道場や、自分の活動エリアの道場をすぐ見れるように管理しておきたいな…
                </p>
                <p>
                    自分にあった弓道場や、参考になった口コミなどをリアクションすることで、<br>
                    マイページで管理することが可能です。
                </p>
                <a type="button" 
                   class="btn btn_check" 
                   href="{{route('mypage')}}">
                    マイページを見に行く
                </a>
            </div>
        </div>
    </div>
    
    
    <div id="aboutbottom">
        <h4>
            みんなで弓道場の情報を集めることで、
            <br>楽しく・気持ちよく練習するための<strong>弓道場の手引書</strong>を作っていこう！！
        </h4>
        <img src="../../images/dojosearch.gif" alt="弓道場を探そう">
        <div>
            @auth
                <a type="button" 
                   class="btn btn_check" 
                   href="{{route('home')}}">
                    弓道場のTEBIKIをはじめる
                </a>
            @else
                <a type="button" 
                   class="btn btn_check" 
                   href="{{route('register')}}">
                    弓道場のTEBIKIをはじめる
                </a>
            @endauth
        </div>
    </div>
</div>

@endsection