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
                   <a id="fav-enable-{{$review->id}}" class="review reviewbtn" data-fav="{{$review->isFavoritedBy(Auth::user())}}" data-id="{{$review->id}}">
                       <i class="fa-solid fa-thumbs-up"></i>
                       <span>済</span>
                       <span>{{$review->favorites->count()}}</span>
                   </a>

                   <a id="fav-disable-{{$review->id}}" class="review reviewdeletebtn" data-fav="{{$review->isFavoritedBy(Auth::user())}}" data-id="{{$review->id}}">
                       <i class="fa-solid fa-thumbs-up"></i>
                       <span>{{$review->favorites->count()}}</span>
                   </a>
                @else
                    <a href="{{route('login')}}" style="color:#808080;">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>{{$review->favorites->count()}}</span>
                    </a>
                @endauth
                <span>
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


@section('script')
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

<script>
    // まず、いいねされているかどうかを確認し、どっちを表示するかを設定
    $(".review").each(function(){
        let isFav = $(this).data("fav");
        
        if(isFav){
            if($(this).hasClass("reviewbtn")){
              console.log("fav");
            } else {
              $(this).css("display", "none");
            }
        } else {
            if($(this).hasClass("reviewbtn")){
              $(this).css("display", "none");
            } else {
              console.log("not fav");
            }
        }
    });

    <!--idといいねされているかを取得して、そのデータを非同期で送る-->
    $(".review").on("click", function(){
        let reviewId = $(this).data("id");
        let oldIsFav = $(this).data("fav");
        
        let isThisEnable = $(this).hasClass("reviewbtn");
        
        $.ajax("{{route('favorite', ['dojo'=>$dojo->id, 'review'=> $review->id ])}}",
            {
              type: "get"
            })
            .done(function(data){
                console.log("done");

                let enableFav = $("#fav-enable-" + reviewId);
                let disableFav = $("#fav-disable-" + reviewId);
        
                let isFav = data.isFavorite ? "" :"1";
                enableFav.data("fav", isFav);
                disableFav.data("fav", isFav);
    
                
                console.log(isFav);
                
                if(isFav){
                    if(isThisEnable){
                    } else {
                      $("#fav-enable-" + reviewId).css("display", "");
                      $("#fav-disable-" + reviewId).css("display", "none");
                    }
                } else {
                    if(isThisEnable){
                      $("#fav-enable-" + reviewId).css("display", "none");
                      $("#fav-disable-" + reviewId).css("display", "");
                    } else {
                    }
                }
            })
            .fail(function(e){
              console.log(e);
            });

    });

</script>

@endsection