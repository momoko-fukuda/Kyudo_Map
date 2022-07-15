<!--★マイページの画面-->

@extends('layouts.app')


@section('content')

<div>
    <div>
        <a href="{{route('home')}}">Home</a>>
        <strong class="now">マイページ編集</strong>
    </div>
</div>

<!--メッセージ-->
@if(session('status'))
    <div class="alert alert-primary alert-dismissible fade show">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif



<!--ユーザー情報-->
<h1><strong>{{$user->name}}</strong>さんのマイページ</h1>
<div>
    
    <div>
        @if($user->img)
        <img src="https://s3-ap-northeast-1.amazonaws.com/kyudo-map-img/{{$user->img}} " alt="{{$user->name}}のユーザー画像" class="w-25 h-50">
        @else
        <p>ユーザー画像は登録されてません</p>
        @endif
    </div>
    
    <div>
        <p>ユーザー情報</p>
        <p>ユーザー名：<strong>{{$user->name}}</strong></p>
        <p>登録メールアドレス：<strong>{{$user->email}}</strong></p>
        <p>登録エリア：<strong>{{$user->area->name}}</strong></p>
    </div>
    <div>
        <a href="{{route('mypage.edit', $user->id)}}" type="button" class="btn btn-primary">ユーザー情報を編集する</a>
        <a href="{{route('mypage.edit_password', $user->id)}}" type="button" class="btn btn-primary">パスワードを更新する</a>
        <a href="{{route('mypage.edit', $user->id)}}" type="button" class="btn btn-secondary">退会する</a>
    </div>
    
</div>

<hr>
<!--各種情報-->
<div>
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item">
           <a class="nav-link active" id="item1-tab" data-toggle="tab" href="#item1" role="tab" aria-controls="item1" aria-selected="true">投稿した口コミ</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" id="item2-tab" data-toggle="tab" href="#item2" role="tab" aria-controls="item2" aria-selected="false">参考になった口コミ</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" id="item3-tab" data-toggle="tab" href="#item3" role="tab" aria-controls="item3" aria-selected="false">お気に入り道場</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" id="item4-tab" data-toggle="tab" href="#item4" role="tab" aria-controls="item4" aria-selected="false">利用した道場</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" id="item5-tab" data-toggle="tab" href="#item5" role="tab" aria-controls="item5" aria-selected="false">登録地域の道場</a>
        </li>
    </ul>
    
    <div class="tab-content">
        <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
            
            @if($reviews->isEmpty())
                <p>まだ口コミ投稿されてません。しっている道場がある場合、口コミ投稿して情報を共有しよう！</p>
                <a href="{{route('dojos.index')}}">弓道場を探しにいく</a>
            @else
                <p>{{$user->name}}さんが投稿した口コミを一覧表示しております。</p>
                @foreach($reviews as $review)
                    <div class="card" style="width:50rem;">
                        <div class="card-body">
                            <p class="card-subtitle"><strong>{{$review->user->name}}</strong>さんの口コミ</p>
                            <h5 class="card-title">{{$review->title}}</h5>
                            <p class="card-text">{{$review->body}}</p>
                            <div>
                                @foreach($review->dojophotos as $value)
                                    <img src="{{ $value['img'] }}" class="w-25 h-50 hidephotos" style="display:none;">
                                @endforeach
                                @if($review->dojophotos->isNotEmpty())
                                    <a type="button" class="photomore" style="display:block;">写真を表示する</a>
                                @endif
                            </div>
                            <span>参考になった数：{{$review->favorites->count()}}</span>
                            <p>{{$review->created_at}}</p>
                            <a href="{{route('reviews.index', $review->dojo->id)}}">{{$review->dojo->name}}を見に行く</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
        <div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
            
            @if($reviews->isEmpty())
                <p>まだ口コミ投稿にリアクションしてません。口コミをみにいきましょう！</p>
                <a href="{{route('dojos.index')}}">弓道場を探しにいく</a>
            @else
            <p>{{$user->name}}さんが参考になったボタンを押した口コミを表示しております。</p>
            @foreach($favoriteReviews as $favoriteReview)
            
                <div class="card" style="width:50rem;">
                    <div class="card-body">
                        <p class="card-subtitle"><strong>{{$favoriteReview->user->name}}</strong>さんの口コミ</p>
                        <h5 class="card-title">{{App\Model\Review::find($favoriteReview->favoriteable_id)->title}}</h5>
                        <p class="card-text">{{App\Model\Review::find($favoriteReview->favoriteable_id)->body}}</p>
                        <div>
                            @foreach(App\Model\Review::find($favoriteReview->favoriteable_id)->dojophotos as $value)
                                <img src="{{ $value['img'] }}" class="w-25 h-50 hidephotos" style="display:none;">
                            @endforeach
                            @if(App\Model\Review::find($favoriteReview->favoriteable_id)->dojophotos->isNotEmpty())
                                <a type="button" class="photomore" style="display:block;">写真を表示する</a>
                            @endif
                        </div>
                    </div>
                        <p>{{App\Model\Review::find($favoriteReview->favoriteable_id)->created_at}}</p>
                        <a href="{{route('dojos.show', App\Model\Review::find($favoriteReview->favoriteable_id)->dojo->id)}}" class="card-link">{{ App\Model\Review::find($favoriteReview->favoriteable_id)->dojo->name }}を見に行く</a>
                </div>
            @endforeach
            @endif
        </div>
        
        <div class="tab-pane fade" id="item3" role="tabpanel" aria-labelledby="item3-tab">
            
            
            @if($favoriteDojos->isEmpty())
                <p>まだ道場にリアクションしてません。道場をみにいきましょう！</p>
                <a href="{{route('dojos.index')}}">弓道場を探しにいく</a>
            @else
                <p>{{$user->name}}さんがお気に入りボタンを押した道場を表示しております。</p>
                @foreach($favoriteDojos as $favoriteDojo)
                    <div class="card" style="width:50rem;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('dojos.show', $favoriteDojo->dojo->id)}}">{{$favoriteDojo->dojo->name}}</a></h5>
                            <p class="card-subtitle">{{$favoriteDojo->dojo->area->name}}{{$favoriteDojo->dojo->address1}}{{$favoriteDojo->dojo->address2}}</p>
                            <p class="card-text">{{$favoriteDojo->dojo->tel}}</p>
                            <p class="card-text">口コミ{{$favoriteDojo->dojo->reviews->count()}}件</p>
                            <p class="card-text">お気に入り{{ $favoriteDojo->dojo->favoritebuttons->count() }}件</p>
                            <p class="card-text">利用したアプリ内ユーザー数{{ $favoriteDojo->dojo->usebuttons->count() }}件</p>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
        
        <div class="tab-pane fade" id="item4" role="tabpanel" aria-labelledby="item4-tab">
            
            @if($favoriteDojos->isEmpty())
                <p>利用した道場はまだありません。</p>
                <a href="{{route('dojos.index')}}">弓道場を探しにいく</a>
                
            @else
                <p>{{$user->name}}さんが利用したボタンを押した道場を表示しております。</p>
                @foreach($useDojos as $useDojo)
                    <div class="card" style="width:50rem;">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{route('dojos.show', $useDojo->dojo->id)}}">{{$useDojo->dojo->name}}</a></h5>
                                <p class="card-subtitle">{{$useDojo->dojo->area->name}}{{$useDojo->dojo->address1}}{{$useDojo->dojo->address2}}</p>
                                <p class="card-text">{{$useDojo->dojo->tel}}</p>
                                <p class="card-text">口コミ{{$useDojo->dojo->reviews->count()}}件</p>
                                <p class="card-text">お気に入り{{ $useDojo->dojo->favoritebuttons->count() }}件</p>
                                <p class="card-text">利用したアプリ内ユーザー数{{ $useDojo->dojo->usebuttons->count() }}件</p>
                            </div>
                        </div>
                @endforeach
            @endif
        </div>
        
        <div class="tab-pane fade" id="item5" role="tabpanel" aria-labelledby="item5-tab">
            
            @if($latestDojos->isEmpty())
                <p>この地域で登録されている道場はまだありません。</p>
                <a href="{{route('dojos.create')}}">知っている道場を新規登録する</a>
                <a href="{{route('dojos.index')}}">弓道場を探しにいく</a>
            @else
                <p>{{$user->name}}さんの登録した活動エリアの道場を、更新日時が新しい順に表示してます。</p>
                @foreach($latestDojos as $latestDojo)
                    <div class="card" style="width:50rem;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('dojos.show', $latestDojo->id)}}">{{$latestDojo->name}}</a></h5>
                            <p class="card-subtitle">{{$latestDojo->area->name}}{{$latestDojo->address1}}{{$latestDojo->address2}}</p>
                            <p class="card-text">{{$latestDojo->tel}}</p>
                            <p class="card-text">口コミ{{$latestDojo->reviews->count()}}件</p>
                            <p class="card-text">お気に入り{{ $latestDojo->favoritebuttons->count() }}件</p>
                            <p class="card-text">利用したアプリ内ユーザー数{{ $latestDojo->usebuttons->count() }}件</p>
                            <p>最終更新：{{$latestDojo->updated_at}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
    </div>
    
    
    
</div>


@endsection