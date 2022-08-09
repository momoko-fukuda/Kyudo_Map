<!--★道場検索・一覧画面-->

@extends('layouts.app')

@section('content')

<!--パンくずリスト-->
<div class="route">
    <a href="{{route('home')}}">
        <i class="fa-solid fa-vihara"></i>
    </a>
    <i class="fa-solid fa-angles-right"></i>
    <strong class="now">弓道場検索</strong>
</div>
<hr>


<div id="searchtop">
    <h1>弓道場検索</h1>
    
    <form method="GET" action="{{ route('dojos.index') }}">
        @csrf
        <div class="form-group col-md-8">
            <label for="area_id">
                <strong>都道府県検索</strong>
            </label>
            <select id="area_id" 
                    class="form-control" 
                    name="area_id" 
                    data-toggle="select">
                <option value="0">
                    全ての都道府県を検索する
                </option>
                @foreach($areas as $area)
                    <option value="{{$area->id}}" 
                            @if( $area_id == $area->id ) selected @endif>
                        {{$area->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-8">
            <label for="addresskeyword">
                <strong>市区町村検索</strong>
            </label>
            <input id="addresskeyword" 
                   type="text" 
                   class="form-control" 
                   name="addresskeyword" 
                   value="{{ $addresskeyword }}"
                   autocomplete="address-level2" 
                   autofocus 
                   placeholder="検索したい市区町村名を記入">
        </div>
        <div class="form-group col-md-8">
            <label for="dojo_name">
                <strong>道場名検索</strong>
            </label>
            <input id="dojo_name" 
                   type="text" 
                   class="form-control" 
                   name="dojo_name" 
                   value="{{ $dojo_name }}"
                   autocomplete="on" 
                   autofocus 
                   placeholder="検索したい道場名を記入">
        </div>
        <div id="conditions" 
             class="form-group col-md-8">
            <p>
                <strong>利用条件</strong>
            </p>
            <ul>
                <li>
                    <input type="checkbox" 
                           name="use_personal" 
                           value="可能" 
                           @if( $use_personal == "可能" ) checked @endif>
                    <label>個人利用可</label>
                </li>
                <li>
                    <input type="checkbox" 
                           name="use_group" 
                           value="可能" 
                           @if( $use_group == "可能" ) checked @endif>
                    <label>団体利用可</label>
                </li>
            </ul>
        </div>
        
        <button type="submit" class="btn btn_check">検索</button>
    </form>
</div>


<!--GoogleMap-->
<!--<hr>-->
<!--<div class="">-->
<!--    <h4>弓道MAP</h4>-->
<!--    <div class="bg-secondary">MAP表示</div>-->
<!--</div>-->



<!--検索結果一覧-->

<div id="searchresults">
    <h4>検索結果</h4>
    @if(count($dojos) > 0)
        
        <p class="searchcount">
            <i class="fa-solid fa-magnifying-glass"></i>
            全{{$dojos->total()}}件中
            {{($dojos->currentPage() -1)* $dojos->perPage() + 1}}-
            {{(($dojos->currentPage() -1)* $dojos->perPage() + 1)+(count($dojos)-1)}}件の弓道場が表示されています。
        <p>
    @else
        <p class="searchcount">
            <i class="fa-solid fa-magnifying-glass"></i>
            0件
        </p>
    @endif


    @forelse($dojos as $dojo)
    <div class="card">
        <div class="card-header">
            <a href="{{route('dojos.show', $dojo)}}">
                <i class="fa-solid fa-vihara"></i>
                {{$dojo->name}}
            </a>
        </div>
        <div class="card-body">
            
            <p class="card-text">住所：{{$dojo->area->name}}{{$dojo->address1}}{{$dojo->address2}}</p>
            <p class="card-text">電話番号：<a href="tel:{{$dojo->tel}}">{{$dojo->tel}}</a></p>
            @if($dojo->use_personal == '可能')
            <span>個人利用可</span>
            @endif
            @if($dojo->use_group == '可能')
            <span>団体利用可</span>
            @endif
            <hr>
            <small>
                    <i class="fa-solid fa-comment-dots"></i>
                    {{$dojo->reviews->count()}}件
            </small>
            <small>
                <i class="fa-solid fa-heart"></i>
                {{ $dojo->favoritebuttons->count() }}件
            </small>
            <small>
                <i class="fa-solid fa-user-check"></i>
                {{ $dojo->usebuttons->count() }}件
            </small>
        </div>
    </div>
    
    @empty
    <div class="nosearch">
        <p>該当する道場は見つかりませんでした</p>
        <img src="../../images/dojosearch.gif" alt="弓道場が見つかりません">
        <a type="button" class="btn btn_check" href="{{route('dojos.create')}}">
            知っている弓道場を登録する
        </a>
    </div>
    
    @endforelse
    {{$dojos->links()}}

</div>
@endsection