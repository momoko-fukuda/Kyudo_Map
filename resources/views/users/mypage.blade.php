<!--★マイページの画面-->

@extends('layouts.app')


@section('content')

<div class="route">
    <div>
        <a href="{{route('home')}}">
            <i class="fa-solid fa-vihara"></i>
        </a>
        <i class="fa-solid fa-angles-right"></i>
        <strong class="now">
            <i class="fa-solid fa-bullseye"></i>
            {{$user->name}}さんのマイページ
        </strong>
    </div>
</div>
<hr>

<!--メッセージ-->
@if(session('status'))
    <div class="alert 
                alert-primary 
                alert-dismissible 
                fade show
                w-75 m-auto">
        {{ session('status') }}
        <button type="button" 
                class="close" 
                data-dismiss="alert" 
                aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif



<!--ユーザー情報-->
<div class="usermenu">
    <img src="../../images/to_edit.png">
    <h3>
        <strong>{{$user->name}}</strong>さんのマイページ
    </h3>

    <div class="dropdown">
        <button type="button" 
                id="dropdown1"
                class="btn 
                       btn_check 
                       dropdown-toggle 
                       btn-sm"
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
            <img src="https://s3-ap-northeast-1.amazonaws.com/kyudo-map-img/{{$user->img}}" 
                 alt="{{$user->name}}のユーザー画像">
            @else
            <img src="../../images/kyudo_review.png" 
                 alt="{{$user->name}}のユーザー画像">
            @endif
        </div>
        
        <div class="flex-grow-1
                    username">
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
                活動地域<br>
                <strong>{{$user->area->name}}</strong>
            </p>
        </div>
    </div>

</div>


<hr>
<!--各種情報-->
<div id="userinfo">
    <ul class="nav nav-pills justify-content-center" role="tablist">
        <li class="nav-item">
           <a class="nav-link active" 
              id="item1-tab" 
              data-toggle="tab" 
              href="#item1" role="tab" 
              aria-controls="item1" 
              aria-selected="true">
               投稿した口コミ
            </a>
        </li>
        <li class="nav-item">
           <a class="nav-link" 
              id="item2-tab" 
              data-toggle="tab" 
              href="#item2" 
              role="tab" 
              aria-controls="item2" 
              aria-selected="false">
               参考になった口コミ
            </a>
        </li>
        <li class="nav-item">
           <a class="nav-link" 
              id="item3-tab" 
              data-toggle="tab" 
              href="#item3" 
              role="tab" 
              aria-controls="item3" 
              aria-selected="false">
               お気に入り道場
            </a>
        </li>
        <li class="nav-item">
           <a class="nav-link" 
              id="item4-tab" 
              data-toggle="tab" 
              href="#item4" 
              role="tab" 
              aria-controls="item4" 
              aria-selected="false">
               利用した道場
            </a>
        </li>
        <li class="nav-item">
           <a class="nav-link" 
              id="item5-tab" 
              data-toggle="tab" 
              href="#item5" 
              role="tab" 
              aria-controls="item5" 
              aria-selected="false">
               活動地域の道場
            </a>
        </li>
    </ul>
    
    <!--投稿した口コミ一覧-->
    <div class="tab-content" id="reviews">
        <div class="tab-pane fade show active" 
             id="item1" 
             role="tabpanel" 
             aria-labelledby="item1-tab">
            
            @if($reviews->isEmpty())
                <p>まだ口コミ投稿されてません。
                    <br>行ったことのある弓道場の口コミ投稿して、情報を共有しよう！
                </p>
                <a class="btn btn_check" href="{{route('dojos.index')}}">
                    弓道場を探しにいく
                </a>
            @else
                <p>
                    投稿した口コミ
                </p>
                @foreach($reviews as $review)
                    <div class="card" data-review-id="{{$review->id}}">
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
        
                            <div class="mb-2">
                                @foreach($review->dojophotos as $value)
                                    <img src="https://s3-ap-northeast-1.amazonaws.com/kyudo-map-img/{{ $value['img'] }}" 
                                         class="hidephotos">
                                @endforeach
                                @if($review->dojophotos->isNotEmpty())
                                    <a type="button" class="photomore">
                                        写真を表示する
                                    </a>
                                @endif
                            </div>
                            <span>
                                投稿日：{{$review->created_at->format('Y年m月d日')}}
                            </span>
                            
                            <hr>
                            <div class="mt-3">
                                <span>
                                    <i class="fa-solid fa-thumbs-up"></i>
                                    {{$review->reviewbuttons_count}} | 
                                </span>
                                <span>
                                    <a href="{{route('reviews.index', $review->dojo->id)}}">
                                            <i class="fa-solid fa-comments"></i>
                                        {{$review->dojo->name}}の口コミ
                                    </a>
                                </span>
                                <!--口コミ削除-->
                                <div class="d-inline-block">
                                    <form method="POST" 
                                          action="/mypage/reviewsdelete/{{$review->id}}">
                                        @csrf
                                        <input type="hidden" 
                                               name="_method" 
                                               value="DELETE">
                                        <button type="submit" 
                                                class="btn 
                                                       reviewdeletebtn">
                                                <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
        <!--参考になった口コミ-->
        <div class="tab-pane fade" 
             id="item2" role="tabpanel" 
             aria-labelledby="item2-tab">
            
            @if($favoriteReviews->isEmpty())
                <p>まだ口コミにリアクションしてません。
                    <br>弓道場を探して、口コミを見に行きましょう！
                </p>
                <a class="btn btn_check" href="{{route('dojos.index')}}">
                    弓道場を探しにいく
                </a>
            @else
            <p>参考になった口コミ</p>
            @foreach($favoriteReviews as $favoriteReview)
            
                <div class="card">
                        <div class="card-header">
                            <a href="{{route('dojos.show', $favoriteReview->review->dojo_id)}}" 
                               class="card-link">
                                <i class="fa-solid fa-vihara"></i>
                                <strong>
                                    {{$favoriteReview->review->dojo->name}}
                                </strong>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$favoriteReview->review->title}}
                            </h5>
                            <hr>
                            <p class="card-text">
                                {{$favoriteReview->review->body}}
                            </p>
        
                            <div class="mb-3">
                                @foreach($favoriteReview->review->dojophotos as $value)
                                    <img src="https://s3-ap-northeast-1.amazonaws.com/kyudo-map-img/{{ $value['img'] }}" 
                                         class="hidephotos"
                                         alt="弓道場の写真">
                                @endforeach
                                @if($favoriteReview->review->dojophotos->isNotEmpty())
                                    <a type="button" class="photomore">
                                        写真を表示する
                                    </a>
                                @endif
                            </div>
                            
                            @if($favoriteReview->review->user_id)
                                <span class="card-subtitle">
                                    <i class="fa-solid fa-person-circle-check"></i>
                                    {{$favoriteReview->review->user->name}} | 
                                </span>
                            @else
                                <span class="card-subtitle">
                                    <i class="fa-solid fa-person-circle-minus"></i>
                                    退会済 | 
                                </span>
                            @endif
                            <span>
                                <a href="{{route('reviews.index', $favoriteReview->review->dojo_id)}}">
                                        <i class="fa-solid fa-comments"></i>
                                        {{$favoriteReview->review->dojo->name}}の口コミ
                                </a>
                            </span>
                            <span>
                                |投稿日：{{$favoriteReview->review->created_at->format('Y年m月d日')}}
                            </span>
                        </div>
                    </div>
            @endforeach
            @endif
        </div>
        
        
        <!--お気に入り道場-->
        <div class="tab-pane fade" 
             id="item3" 
             role="tabpanel" 
             aria-labelledby="item3-tab">
            
            
            @if($favoriteDojos->isEmpty())
                <p>まだお気に入りの弓道場はありません。
                    <br>弓道場を見にいこう！
                </p>
                <a class="btn btn_check" href="{{route('dojos.index')}}">
                    弓道場を探しにいく
                </a>
                <a class="btn btn_check" href="{{route('dojos.create')}}">
                    弓道場を登録する
                </a>
            @else
                <p>お気に入りの弓道場</p>
                @foreach($favoriteDojos as $favoriteDojo)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('dojos.show', $favoriteDojo->dojo->id)}}">
                                <i class="fa-solid fa-vihara"></i>
                                {{$favoriteDojo->dojo->name}}
                            </a>
                        </div>
                        <div class="card-body">
                            
                            <p class="card-text">
                                住所：{{$favoriteDojo->dojo->area->name}}
                                      {{$favoriteDojo->dojo->address1}}
                                      {{$favoriteDojo->dojo->address2}}
                            </p>
                            <p class="card-text">
                                電話番号：
                                <a href="tel:{{$favoriteDojo->dojo->tel}}">
                                    {{$favoriteDojo->dojo->tel}}
                                </a>
                            </p>
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
        <div class="tab-pane fade" 
             id="item4" 
             role="tabpanel" 
             aria-labelledby="item4-tab">
            
            @if($useDojos->isEmpty())
                <p>利用した道場はまだありません。
                    <br>近くに弓道場がないか探しにいこう！
                </p>
                <a class="btn btn_check" href="{{route('dojos.index')}}">
                    弓道場を探しにいく
                </a>
                <a class="btn btn_check" href="{{route('dojos.create')}}">
                    弓道場を登録する
                </a>
            @else
                <p>
                    利用した弓道場
                </p>
                @foreach($useDojos as $useDojo)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('dojos.show', $useDojo->dojo->id)}}">
                                <i class="fa-solid fa-vihara"></i>
                                {{$useDojo->dojo->name}}
                            </a>
                        </div>
                        <div class="card-body">
                            
                            <p class="card-text">
                                住所：{{$useDojo->dojo->area->name}}
                                      {{$useDojo->dojo->address1}}
                                      {{$useDojo->dojo->address2}}
                            </p>
                            <p class="card-text">
                                電話番号：
                                <a href="tel:{{$useDojo->dojo->tel}}">
                                    {{$useDojo->dojo->tel}}
                                </a>
                            </p>
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
        
        <div class="tab-pane fade" 
             id="item5" 
             role="tabpanel" 
             aria-labelledby="item5-tab">
            
            @if($latestDojos->isEmpty())
                <p>この地域で登録されている弓道場はまだありません。
                    <br>知っている弓道場を新規登録して共有しよう！
                </p>
                <a class="btn btn_check" href="{{route('dojos.create')}}">
                    弓道場を登録する
                </a>
                <a class="btn btn_check" href="{{route('dojos.index')}}">
                    弓道場を探しにいく
                </a>
            @else
                <p>
                    活動地域の弓道場
                    <br>
                    <small>※更新順に表示</small>
                </p>

                @foreach($latestDojos as $latestDojo)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('dojos.show', $latestDojo->id)}}">
                                <i class="fa-solid fa-vihara"></i>
                                {{$latestDojo->name}}
                            </a>
                        </div>
                        <div class="card-body">
                            
                            <p class="card-text">
                                住所：{{$latestDojo->area->name}}
                                      {{$latestDojo->address1}}
                                      {{$latestDojo->address2}}
                            </p>
                            <p class="card-text">
                                電話番号：
                                <a href="tel:{{$latestDojo->tel}}">
                                    {{$latestDojo->tel}}
                                </a>
                            </p>
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