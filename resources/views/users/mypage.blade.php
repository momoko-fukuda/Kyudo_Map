<!--★マイページの画面-->

@extends('layouts.app')


@section('content')

<div class="route">
    <div>
        <a href="{{route('home')}}">
            <i class="fa-solid fa-vihara"></i>
        </a>
        <i class="fa-solid fa-angles-right"></i>
        <strong class="now">マイページ編集</strong>
    </div>
</div>
<hr>

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
<div class="usermenu">
    <h3>
        <img src="../../images/to_edit.png">
        <strong>{{$user->name}}</strong>さんのマイページ
    </h3>
    
    
    <div class="dropdown">
        <button type="button" id="dropdown1"
                class="btn btn_check dropdown-toggle btn-sm"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
            <i class="fa-solid fa-user-pen"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" 
             aria-labelledby="dropdown1">
            <a class="dropdown-item" 
               href="{{route('mypage.edit', $user->id)}}">
                ユーザー情報を編集する
            </a>
            <a class="dropdown-item" 
               href="{{route('mypage.edit_password', $user->id)}}">
                パスワードを更新する
            </a>
            <a class="dropdown-item" 
               href="{{route('mypage.deleteview', $user->id)}}">
                退会申請
            </a>
        </div>
    </div>
</div>

<div id="users">
    <h4>ユーザー情報</h4>
    <div class="usermenu">
        
        <div class="userimg">
            @if($user->img)
            <img src="https://s3-ap-northeast-1.amazonaws.com/kyudo-map-img/{{$user->img}}" alt="{{$user->name}}のユーザー画像">
            @else
            <img src="../../images/kyudo_review.png" alt="{{$user->name}}のユーザー画像">
            @endif
        </div>
        
        <div class="flex-grow-1 pl-5">
            <p>
                <i class="fa-solid fa-person-circle-check"></i>
                ユーザー名<br>
                <strong>{{$user->name}}</strong>
            </p>
            <p>
                <i class="fa-solid fa-envelope-circle-check"></i>
                登録メールアドレス<br>
                <strong>{{$user->email}}</strong>
            </p>
            <p>
                <i class="fa-solid fa-location-dot"></i>
                登録エリア<br>
                <strong>{{$user->area->name}}</strong>
            </p>
        </div>
    </div>

</div>


<hr>
<!--各種情報-->
<div id="userinfo">
    <ul class="nav nav-tabs justify-content-center" role="tablist">
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
    
    <!--投稿した口コミ一覧-->
    <div class="tab-content" id="reviews">
        <div class="tab-pane fade show active" 
             id="item1" 
             role="tabpanel" 
             aria-labelledby="item1-tab">
            
            @if($reviews->isEmpty())
                <p>まだ口コミ投稿されてません。しっている道場がある場合、口コミ投稿して情報を共有しよう！</p>
                <a href="{{route('dojos.index')}}">弓道場を探しにいく</a>
            @else
                <p>
                    <strong>{{$user->name}}</strong>さんが投稿した口コミを一覧
                </p>
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
                            <h5 class="card-title">{{$review->title}}</h5>
                            <hr>
                            <p class="card-text">{{$review->body}}</p>
        
                            <div>
                                @foreach($review->dojophotos as $value)
                                    <img src="{{ $value['img'] }}" 
                                         class="hidephotos">
                                @endforeach
                                @if($review->dojophotos->isNotEmpty())
                                    <a type="button" class="photomore">写真を表示する</a>
                                @endif
                            </div>
                            <span>投稿日：{{$review->created_at->format('Y年m月d日')}}</span>|
                            <span>
                                <i class="fa-solid fa-thumbs-up"></i>
                                {{$review->favorites->count()}} | 
                            </span>
                            <a href="{{route('reviews.index', $review->dojo->id)}}">
                                <span>
                                    <i class="fa-solid fa-comments"></i>
                                    {{$review->dojo->name}}の口コミ
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
        <!--参考になった口コミ-->
        <div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
            
            @if($reviews->isEmpty())
                <p>まだ口コミ投稿にリアクションしてません。口コミをみにいきましょう！</p>
                <a href="{{route('dojos.index')}}">弓道場を探しにいく</a>
            @else
            <p><strong>{{$user->name}}</strong>さんが参考になった口コミ</p>
            @foreach($favoriteReviews as $favoriteReview)
            
                <div class="card">
                        <div class="card-header">
                            <a href="{{route('dojos.show',App\Model\Review::find($favoriteReview->favoriteable_id)->id)}}" 
                               class="card-link">
                                <i class="fa-solid fa-vihara"></i>
                                <strong>{{App\Model\Review::find($favoriteReview->favoriteable_id)->dojo->name}}</strong>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{App\Model\Review::find($favoriteReview->favoriteable_id)->title}}</h5>
                            <hr>
                            <p class="card-text">{{App\Model\Review::find($favoriteReview->favoriteable_id)->body}}</p>
        
                            <div>
                                @foreach(App\Model\Review::find($favoriteReview->favoriteable_id)->dojophotos as $value)
                                <img src="{{ $value['img'] }}" class="hidephotos">
                                @endforeach
                                @if(App\Model\Review::find($favoriteReview->favoriteable_id)->dojophotos->isNotEmpty())
                                    <a type="button" class="photomore">写真を表示する</a>
                                @endif
                            </div>
                            <span>投稿日：{{App\Model\Review::find($favoriteReview->favoriteable_id)->created_at->format('Y年m月d日')}}</span>|
                            @if(App\Model\Review::find($favoriteReview->favoriteable_id)->user)
                                <span class="card-subtitle">
                                    <i class="fa-solid fa-person-circle-check"></i>
                                    {{App\Model\Review::find($favoriteReview->favoriteable_id)->user->name}} | 
                                </span>
                            @else
                                <span class="card-subtitle">
                                    <i class="fa-solid fa-person-circle-minus"></i>
                                    退会済 | 
                                    </span>
                            @endif
                            <span>
                                <i class="fa-solid fa-thumbs-up"></i>
                                {{App\Model\Review::find($favoriteReview->favoriteable_id)->favorites->count()}} | 
                            </span>
                            <a href="{{route('reviews.index', App\Model\Review::find($favoriteReview->favoriteable_id)->id)}}">
                                <span>
                                    <i class="fa-solid fa-comments"></i>
                                    {{App\Model\Review::find($favoriteReview->favoriteable_id)->dojo->name}}の口コミ
                                </span>
                            </a>
                        </div>
                    </div>
            @endforeach
            @endif
        </div>
        
        
        <!--お気に入り道場-->
        <div class="tab-pane fade" id="item3" role="tabpanel" aria-labelledby="item3-tab">
            
            
            @if($favoriteDojos->isEmpty())
                <p>まだ道場にリアクションしてません。道場をみにいきましょう！</p>
                <a href="{{route('dojos.index')}}">弓道場を探しにいく</a>
            @else
                <p><strong>{{$user->name}}</strong>さんがお気に入りした道場</p>
                @foreach($favoriteDojos as $favoriteDojo)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('dojos.show', $favoriteDojo)}}">
                                <i class="fa-solid fa-vihara"></i>
                                {{$favoriteDojo->dojo->name}}
                            </a>
                        </div>
                        <div class="card-body">
                            
                            <p class="card-text">住所：{{$favoriteDojo->dojo->area->name}}{{$favoriteDojo->dojo->address1}}{{$favoriteDojo->dojo->address2}}</p>
                            <p class="card-text">電話番号：<a href="tel:{{$favoriteDojo->dojo->tel}}">{{$favoriteDojo->dojo->tel}}</a></p>
                            @if($favoriteDojo->dojo->use_personal == '可能')
                            <span>個人利用可</span>
                            @endif
                            @if($favoriteDojo->dojo->use_group == '可能')
                            <span>団体利用可</span>
                            @endif
                            <hr>
                            <small>
                                <i class="fa-solid fa-comment-dots"></i>
                                {{$favoriteDojo->dojo->reviews->count()}}件
                            </small>
                            <small>
                                <i class="fa-solid fa-heart"></i>
                                {{ $favoriteDojo->dojo->favoritebuttons->count() }}件
                            </small>
                            <small>
                                <i class="fa-solid fa-user-check"></i>
                                {{ $favoriteDojo->dojo->usebuttons->count() }}件
                            </small>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
        
        <!--利用した道場一覧-->
        <div class="tab-pane fade" id="item4" role="tabpanel" aria-labelledby="item4-tab">
            
            @if($favoriteDojos->isEmpty())
                <p>利用した道場はまだありません。</p>
                <a href="{{route('dojos.index')}}">弓道場を探しにいく</a>
                
            @else
                <p><strong>{{$user->name}}</strong>さんが利用した道場</p>
                @foreach($useDojos as $useDojo)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('dojos.show', $useDojo)}}">
                                <i class="fa-solid fa-vihara"></i>
                                {{$useDojo->dojo->name}}
                            </a>
                        </div>
                        <div class="card-body">
                            
                            <p class="card-text">住所：{{$useDojo->dojo->area->name}}{{$useDojo->dojo->address1}}{{$useDojo->dojo->address2}}</p>
                            <p class="card-text">電話番号：<a href="tel:{{$useDojo->dojo->tel}}">{{$useDojo->dojo->tel}}</a></p>
                            @if($useDojo->dojo->use_personal == '可能')
                            <span>個人利用可</span>
                            @endif
                            @if($useDojo->dojo->use_group == '可能')
                            <span>団体利用可</span>
                            @endif
                            <hr>
                            <small>
                                <i class="fa-solid fa-comment-dots"></i>
                                {{$useDojo->dojo->reviews->count()}}件
                            </small>
                            <small>
                                <i class="fa-solid fa-heart"></i>
                                {{ $useDojo->dojo->favoritebuttons->count() }}件
                            </small>
                            <small>
                                <i class="fa-solid fa-user-check"></i>
                                {{ $useDojo->dojo->usebuttons->count() }}件
                            </small>
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
                <p>
                    <strong>{{$user->name}}</strong>さんの登録した活動エリアの道場
                    <br>※更新順に表示
                </p>

                @foreach($latestDojos as $latestDojo)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('dojos.show', $useDojo)}}">
                                <i class="fa-solid fa-vihara"></i>
                                {{$latestDojo->name}}
                            </a>
                        </div>
                        <div class="card-body">
                            
                            <p class="card-text">住所：{{$latestDojo->area->name}}{{$latestDojo->address1}}{{$latestDojo->address2}}</p>
                            <p class="card-text">電話番号：<a href="tel:{{$latestDojo->tel}}">{{$latestDojo->tel}}</a></p>
                            @if($latestDojo->use_personal == '可能')
                            <span>個人利用可</span>
                            @endif
                            @if($latestDojo->use_group == '可能')
                            <span>団体利用可</span>
                            @endif
                            <hr>
                            <small>
                                <i class="fa-solid fa-comment-dots"></i>
                                {{$latestDojo->reviews->count()}}件
                            </small>
                            <small>
                                <i class="fa-solid fa-heart"></i>
                                {{ $latestDojo->favoritebuttons->count() }}件
                            </small>
                            <small>
                                <i class="fa-solid fa-user-check"></i>
                                {{ $latestDojo->usebuttons->count() }}件
                            </small>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
    </div>
    
    
    
</div>


@endsection