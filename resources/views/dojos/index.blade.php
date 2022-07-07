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
            <label for="area_id">都道府県</label>
            <select id="area_id" class="form-control w-50" name="area_id">
                <option value="" disabled selected style="display:none;">都道府県を選択してください</option>
                @foreach($areas as $area)
                    <option value="{{$area->id}}">{{$area->name}}</option>
                @endforeach
            </select>
        </div>
        <div id="address" class="mt-1">
            <label for="address1">市区町村</label>
            <input id="address1" 
                   type="text" 
                   class="form-control w-50" 
                   name="address1" 
                   autocomplete="address-level2" 
                   autofocus 
                   placeholder="市区町村名を記入してください">
        </div>
        <div id="freeword" class="mt-1">
            <label for="free">フリーワード検索</label>
            <input id="free" 
                   type="text" 
                   class="form-control w-50" 
                   name="free" 
                   autocomplete="on" 
                   autofocus 
                   placeholder="検索したいキーワードを入力してください">
        </div>
        <div id="conditions" class="mt-1">
            <p>詳細条件</p>
            <ul>
                <li>
                    <input type="checkbox" name="conditions" value="true">
                    <label>個人利用可</label>
                </li>
            </ul>
        </div>
        
        <button class="btn btn-primary" onclick="clicksearch()">検索</button>
    </form>
</div>


<!--GoogleMap-->
<hr>
<div class="">
    <h4>弓道MAP</h4>
    <div class="bg-secondary">MAP表示</div>
</div>



<!--検索結果一覧-->
<hr>
<div>
    <h4>検索結果</h4>
    <p>〇件</p>
    @foreach($dojos as $dojo)


    <div class="card" style="width:50rem;">
        <div class="card-body">
            <h5 class="card-title">{{$dojo->name}}</h5>
            <p class="card-subtitle">{{$dojo->area->name}}{{$dojo->address1}}{{$dojo->address2}}</p>
            <p class="card-text">{{$dojo->tel}}</p>
        </div>
    </div>

    @endforeach
    
    
</div>

@endsection