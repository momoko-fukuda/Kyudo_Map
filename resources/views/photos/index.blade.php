<!--★画像一覧-->

@extends('layouts.app')

@section('content')

<!--パンくずリスト-->
<div class="route">
    <a href="{{route('home')}}">
        <i class="fa-solid fa-vihara"></i>
    </a>
    <i class="fa-solid fa-angles-right"></i>
    <a href="{{route('dojos.index')}}">弓道場検索</a>
    <i class="fa-solid fa-angles-right"></i>
    <a href="/dojos/{{$dojo->id}}">{{$dojo->name}}</a>
    <i class="fa-solid fa-angles-right"></i>
    <strong class="now">{{$dojo->name}}写真館</strong>
</div>


<div class="dojophototop">
    <h1>{{$dojo->name}}<br>写真館</h1>
    <img src="../../../images/dojophoto.gif" alt="弓道場写真館">
</div>


<div id="dojophotos">
    <div>
        @foreach($dojophotos as $dojophoto)
            <div class="dojoimg">
                <img src="https://s3-ap-northeast-1.amazonaws.com/kyudo-map-img/{{ $dojophoto['img'] }}">
                @if($dojophoto->user)
                    <small>投稿者：{{$dojophoto->user->name}}さん</small>
                @else
                    <small>投稿者：退会済ユーザー</small>
                @endif
            </div>
        @endforeach
        {{$dojophotos->links()}}
    </div>
</div>
<div class="toreviewcreate">
    <p>
        {{$dojo->name}}の写真をもっていたら、みんなに共有しよう！
    </p>
    <a type=button 
       class="btn btn_check" 
       href="{{route('reviews.create', $dojo->id)}}">
        写真を投稿する
    </a>
</div>

@endsection