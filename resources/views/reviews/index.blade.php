<!--★口コミ詳細画面-->


@extends('layouts.app')

@section('content')


<div class="route">
    <a href="{{ route('home') }}">
        <i class="fa-solid fa-vihara"></i>
    </a>
    <i class="fa-solid fa-angles-right"></i>
    <a href="{{ route('dojos.index') }}">弓道場検索</a>
    <i class="fa-solid fa-angles-right"></i>
    <a href="{{ route('dojos.show', $dojo->id )}}"> {{$dojo->name}} </a>
    <i class="fa-solid fa-angles-right"></i>
    <strong class="now">
        <i class="fa-solid fa-bullseye"></i>
        {{$dojo->name}}の口コミ一覧</strong>
</div>
<hr>

<div id="reviewindex">
    <h1>{{$dojo->name}}の<br>口コミ一覧</h1>
    <img src="../../images/sp_reviewindex.png" alt="弓道場の口コミ一覧">
</div>






<div id="reviews">
    <p>
        <i class="fa-solid fa-magnifying-glass"></i>
        全{{$reviews->total()}}件中
        {{($reviews->currentPage() -1)* $reviews->perPage() + 1}}-
        {{(($reviews->currentPage() -1)* $reviews->perPage() + 1)+(count($reviews)-1)}}
        件の口コミが表示されています。
    <p>
    
    @foreach($reviews as $review)

        <div class="card">
            <div class="card-header">
                <p class="card-title">{{$review->title}}</p>
            </div>
            <div class="card-body">

                <!--投稿ユーザ-->
                @if($review->user)
                    <span class="card-subtitle">
                        <i class="fa-solid fa-person-circle-check"></i>
                        <strong>{{$review->user->name}}</strong>さん
                    </span>
                @else
                    <span class="card-subtitle">
                        <i class="fa-solid fa-person-circle-minus"></i>
                        退会済ユーザー
                    </span>
                @endif
               
                
                
                <!--本文・画像・投稿日-->
                <p class="card-text">{{$review->body}}</p>
                

                <div>
                    @foreach($review->dojophotos as $value)
                        <img src="https://s3-ap-northeast-1.amazonaws.com/kyudo-map-img/{{ $value['img'] }}" 
                             class="hidephotos">
                    @endforeach
                    @if($review->dojophotos->isNotEmpty())
                        <a type="button" class="photomore">写真を表示する</a>
                    @endif
                </div>
                <span>投稿日：{{$review->created_at->format('Y年m月d日')}}</span>
                
                <hr>
                
                
                <!--いいねボタン-->
                @auth
                    <!--いいねしてない時-->
                    @if(!$review->isLikedBy(Auth::user()))
                        <a class="likes">
                            <i class="fa-regular 
                                      fa-thumbs-up 
                                      like-toggle" 
                               data-review-id="{{$review->id}}">
                            </i>
                            <span class="like-counter">
                                {{$review->reviewbuttons_count}}
                            </span>
                        </a>
                    <!--いいねしている時-->
                    @else
                        <a class="likes">
                            <i class="fa-regular 
                                      fa-thumbs-up 
                                      like-toggle liked" 
                                data-review-id="{{$review->id}}">
                            </i>
                            <span class="like-counter">
                                {{$review->reviewbuttons_count}}
                            </span>
                        </a>
                    @endif
                @endauth
                @guest
                    <a class="likes" href="{{route('login')}}">
                        <i class="fa-regular
                                  fa-thumbs-up">
                            </i>
                            <span class="like-counter">
                                {{$review->reviewbuttons_count}}
                            </span>
                    </a>
                @endguest
                    
                <!--違反報告-->
                <span>
                    |
                    <a href="{{route('home.contact')}}">
                        <i class="fa-solid fa-ghost"></i>
                        <span>違反報告</span>
                    </a>
                </span>
            </div>
        </div>
    @endforeach
    {{$reviews->links()}}
    
</div>
<div class="toreviewcreate">
    <p>{{$dojo->name}}を利用したら、みんなに情報を共有しよう！</p>
    <a type=button class="btn btn_check" href="{{route('reviews.create', $dojo->id)}}">口コミ投稿する</a>
</div>

@endsection
