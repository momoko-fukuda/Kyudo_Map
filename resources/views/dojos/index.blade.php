<!--★道場検索・一覧画面-->

@extends('layouts.app')

@section('content')

<!--パンくずリスト-->
<div>
    <div>
        <a href="{{route('home')}}">Home</a>>
        <strong class="now">弓道場検索</strong>
    </div>
</div>


<div>
    <h1>弓道場検索</h1>
    <form method="GET" action="{{ route('dojos.index') }}">
        @csrf
        <div id="area" class="mt-1">
            <label for="area_id">都道府県検索</label>
            <select id="area_id" class="form-control w-50" name="area_id" data-toggle="select">
                <option value="">全ての都道府県を検索する</option>
                @foreach($areas as $area)
                    <option value="{{$area->id}}" @if( $area_id == $area->id ) selected @endif>{{$area->name}}</option>
                @endforeach
            </select>
        </div>
        <div id="address" class="mt-1">
            <label for="addresskeyword">市区町村検索</label>
            <input id="addresskeyword" 
                   type="text" 
                   class="form-control w-50" 
                   name="addresskeyword" 
                   value="{{ $addresskeyword }}"
                   autocomplete="address-level2" 
                   autofocus 
                   placeholder="検索したい市区町村名を記入してください">
        </div>
        <div id="name" class="mt-1">
            <label for="dojo_name">道場名検索</label>
            <input id="dojo_name" 
                   type="text" 
                   class="form-control w-50" 
                   name="dojo_name" 
                   value="{{ $dojo_name }}"
                   autocomplete="on" 
                   autofocus 
                   placeholder="検索したい道場名を記入してください">
        </div>
        <div id="conditions" class="mt-1">
            <p>利用条件</p>
            <ul>
                <li>
                    <input type="checkbox" name="use_personal" value="可能" @if( $use_personal == "可能" ) checked @endif>
                    <label>個人利用可</label>
                </li>
                <li>
                    <input type="checkbox" name="use_group" value="可能" @if( $use_group == "可能" ) checked @endif>
                    <label>団体利用可</label>
                </li>
            </ul>
        </div>
        
        <button type="submit" class="btn btn-primary">検索</button>
    </form>
</div>


<!--GoogleMap-->
<!--<hr>-->
<!--<div class="">-->
<!--    <h4>弓道MAP</h4>-->
<!--    <div class="bg-secondary">MAP表示</div>-->
<!--</div>-->



<!--検索結果一覧-->
<hr>
<div>
    <h4>検索結果</h4>
    @if(count($dojos) > 0)
        <p>全{{$dojos->total()}}件中
            {{($dojos->currentPage() -1)* $dojos->perPage() + 1}}-
            {{(($dojos->currentPage() -1)* $dojos->perPage() + 1)+(count($dojos)-1)}}件の弓道場が表示されています。<p>
    @else
        <p>0件</p>
    @endif


    @forelse($dojos as $dojo)
    <div class="card" style="width:50rem;">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('dojos.show', $dojo)}}">{{$dojo->name}}</a></h5>
            <p class="card-subtitle">{{$dojo->area->name}}{{$dojo->address1}}{{$dojo->address2}}</p>
            <p class="card-text">{{$dojo->tel}}</p>
            <p class="card-text">口コミ{{$dojo->reviews->count()}}件</p>
            <p class="card-text">お気に入り{{ $dojo->favoritebuttons->count() }}件</p>
            <p class="card-text">利用したアプリ内ユーザー数{{ $dojo->usebuttons->count() }}件</p>
        </div>
    </div>
    
    @empty
    <div>該当する道場は見つかりませんでした</div>
    
    @endforelse
    {{$dojos->links()}}
    

    
</div>

@endsection