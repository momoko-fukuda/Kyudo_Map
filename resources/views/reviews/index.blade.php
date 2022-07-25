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
                        <img src="{{ $value['img'] }}" 
                             class="hidephotos">
                    @endforeach
                    @if($review->dojophotos->isNotEmpty())
                        <a type="button" class="photomore">写真を表示する</a>
                    @endif
                </div>
                <span>投稿日：{{$review->created_at->format('Y年m月d日')}}</span>
                
                <hr>
                
                
                <!--いいねボタン/違反報告-->
                @auth
                    @if($review->isFavoritedBy(Auth::user()))
                       <a href="{{route('favorite', ['dojo'=>$dojo->id, 'review'=> $review->id ])}}" class="reviewbtn">
                           <i class="fa-solid fa-thumbs-up"></i>
                           <span>済</span>
                           <span>{{$review->favorites->count()}}</span>
                       </a>
                    @else
                       <a href="{{route('favorite', ['dojo'=>$dojo->id, 'review'=> $review->id ])}}" class="reviewdeletebtn">
                           <i class="fa-solid fa-thumbs-up"></i>
                           <span>{{$review->favorites->count()}}</span>
                       </a>
                    @endif
                @else
                    <a href="{{route('login')}}" style="color:#808080;">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>{{$review->favorites->count()}}</span>
                    </a>
                @endauth
                <a href="{{route('home.contact')}}">
                    <i class="fa-solid fa-ghost"></i>
                    <span>違反報告</span>
                </a>
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