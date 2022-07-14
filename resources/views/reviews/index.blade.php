<!--★口コミ詳細画面-->


@extends('layouts.app')

@section('content')


<div>
    <div>
        <a href="{{ route('home') }}">Home</a>>
        <a href="{{ route('dojos.index') }}">弓道場検索</a>>
        <a href="{{ route('dojos.show', $dojo->id )}}"> {{$dojo->name}} </a>>
        <strong class="now">口コミ一覧</strong>
    </div>
</div>


<h1>口コミ一覧画面</h1>
<a type=button class="btn btn-primary" href="{{route('reviews.create', $dojo->id)}}">口コミ投稿する</a>

@if(count($reviews) > 0)
        <p>全{{$reviews->total()}}件中
            {{($reviews->currentPage() -1)* $reviews->perPage() + 1}}-
            {{(($reviews->currentPage() -1)* $reviews->perPage() + 1)+(count($reviews)-1)}}件の口コミが表示されています。<p>
@else
        <p>ごめんなさい、口コミはまだ投稿されてません</p>
@endif


<div>
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
                <p>{{$review->created_at}}</p>
                <p>違反報告</p>
            </div>
           <div>
            <!--いいねボタン-->
            @auth
               @if($review->isFavoritedBy(Auth::user()))
                   <a href="{{route('favorite', ['dojo'=>$dojo->id, 'review'=> $review->id ])}}" class="btn btn-secondary w-50">
                       参考になった解除
                       <span>{{$review->favorites->count()}}</span>
                   </a>
               @else
                   <a href="{{route('favorite', ['dojo'=>$dojo->id, 'review'=> $review->id ])}}" class="btn btn-primary w-50">
                       参考になった
                       <span>{{$review->favorites->count()}}</span>
                   </a>
               @endif
            @else
                <a href="{{route('login')}}" type="button" class="btn btn-primary w-50">
                    参考になった<span>{{$review->favorites->count()}}</span>
                </a>
           @endauth
           </div>
        </div>
    @endforeach
</div>
{{$reviews->links()}}

@endsection