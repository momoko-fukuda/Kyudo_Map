<!--★画像一覧-->

@extends('layouts.app')

@section('content')

<!--パンくずリスト-->
<div>
    <div>
        <a href="{{route('home')}}">Home</a>>
        <a href="{{route('dojos.index')}}">弓道場検索</a>>
        <a href="/dojos/{{$dojo->id}}">{{$dojo->name}}詳細</a>>
        <strong class="now">{{$dojo->name}}道場写真一覧</strong>
    </div>
</div>

<div>
    <h1>道場写真館</h1>
    <div>
        <p><span>弓道場名：</span>{{$dojo->name}}</p>
        <p><span>住所：</span>{{$dojo->area->name}}{{$dojo->address1}}{{$dojo->address2}}</p>
        <p><span>電話番号：</span>{{$dojo->tel}}</p>
        <p><small>最近更新された日時：{{$dojo->updated_at}}</small></p>
    </div>
    
    <h4>{{$dojo->name}}の写真をもっている場合、みんなに共有しよう！</h4>
    <p>※登録後、弓道のTEBIKI管理者で登録された道場の内容を確認させていただきます。<br>
    内容を確認し、実在しない、または虚偽内容がある場合、削除する可能性がございます。</p>
</div>

<hr>
<div>
    <div>
        @if($dojophotos->isEmpty())
            <p>ごめんなさい、まだ写真はアップされてません</p>
        @else
            @foreach($dojophotos as $dojophoto)
                <img src="{{ $dojophoto['img'] }}" class="w-25 h-50">
            @endforeach
        @endif
        
    </div>
    
    
    
</div>

@endsection