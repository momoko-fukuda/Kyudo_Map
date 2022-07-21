<!--★道場新規登録画面--->


@extends('layouts.app')

@section('content')

<!--パンくずリスト-->

<div class="route">
    <a href="{{route('home')}}">
        <i class="fa-solid fa-vihara"></i>
    </a>
    <i class="fa-solid fa-angles-right"></i>
    <strong class="now">
        <i class="fa-solid fa-bullseye"></i>
        新規弓道場作成
    </strong>
</div>
<hr>


<div id="createtop">
    <h1>新規弓道場登録</h1>
    <p>「弓道場のTEBIKI」に、まだ掲載されていない弓道場を登録して、<br>みんなと共有しよう！
    みんなで共有し合うことで、まだあなたの知らない弓道場に巡り合えるかもしれません。</p>
</div>


<hr>



<h4 class="formname">弓道場登録フォーム</h4>

<div id="dojoform">
    
    <ul class="nav nav-tabs nav-pills" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" 
           id="item1-tab" 
           data-toggle="tab" 
           href="#item1" 
           role="tab" 
           aria-controls="item1" 
           aria-selected="true">
            基本情報
            <i class="fa-solid fa-circle-chevron-right"></i>
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
            利用条件
            <i class="fa-solid fa-circle-chevron-right"></i>
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
            施設情報
            <i class="fa-solid fa-circle-chevron-right"></i>
        </a>
      </li>
    </ul>
    
    <form id="form_dojocreate" 
          action="/dojos" 
          method="POST" 
          enctype="multipart/form-data" 
          class="tab-content">
        {{ csrf_field() }}
        
        <!--グループ１-->
        <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">

            <!--作成ユーザー-->
            <input type="hidden" name="user_id" value="{{$user->id}}">
            
            <!--道場名-->
            <div class="form-group row">
                <label for="name" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    道場名
                       <span class="ml-1 required">必須</span>
                </label>

                <div class="col-md-5">
                   <input id="name" 
                          type="text" 
                          class="form-control 
                                 @error('name') is-invalid @enderror" 
                          name="name" 
                          value="{{ old('name') }}" 
                          required 
                          autocomplete="name" 
                          autofocus 
                          placeholder="サンプル弓道場/スポーツセンター">

                   @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>入力必須項目であり、既に登録済の道場名の可能性があります</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--住所（都道府県）-->
            <div class="form-group row">
                <label for="area_id" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    住所①（都道府県）
                       <span class="ml-1 required">必須</span>
                </label>

                <div class="col-md-5">
                    <select id="area_id" 
                            class="form-control 
                                   @error('area_id') is-invalid @enderror" 
                            name="area_id" 
                            required 
                            autofocus>
                        <option disabled 
                                selected 
                                style="display:none;">
                            都道府県を選択
                        </option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" @if( $area->id == old('area_id')) selected @endif>{{$area->name}}</option>
                        @endforeach
                    </select>
                        
                    @error('area_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>住所（都道府県）を選択してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--住所（市区町村）-->
            <div class="form-group row">
                <label for="address1" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    住所②（市区町村）
                    <span class="ml-1 required">必須</span>
                </label>

                <div class="col-md-5">
                   <input id="address1" 
                          type="text" 
                          class="form-control 
                                 @error('address1') is-invalid @enderror" 
                          name="address1" 
                          value="{{ old('address1') }}" 
                          required 
                          autocomplete="address-level2" 
                          autofocus 
                          placeholder="市区町村名を記入">

                   @error('address1')
                    <span class="invalid-feedback" role="alert">
                        <strong>市区町村名を入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--住所（市区町村以下）-->
            <div class="form-group row">
                <label for="address2" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    住所③（建物名・ビル名など）
                    <span class="ml-1 required">必須</span>
                </label>

                <div class="col-md-5">
                   <input id="address2" 
                          type="text" 
                          class="form-control 
                                 @error('address2') is-invalid @enderror" 
                          name="address2" 
                          value="{{ old('address2') }}" 
                          required 
                          autocomplete="address-level3" 
                          autofocus 
                          placeholder="建物名・ビル名を記入">

                   @error('address2')
                    <span class="invalid-feedback" role="alert">
                        <strong>建物名・ビル名などを入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--電話番号-->
            <div class="form-group row">
                <label for="tel" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    電話番号
                    <span class="ml-1 required">必須</span>
                </label>

                <div class="col-md-5">
                   <input id="tel" 
                          type="text" 
                          class="form-control 
                                 @error('tel') is-invalid @enderror" 
                          name="tel" 
                          value="{{ old('tel') }}" 
                          required 
                          autocomplete="tel" 
                          autofocus 
                          placeholder="例：03-0000-0000">

                   @error('tel')
                    <span class="invalid-feedback" role="alert">
                        <strong>電話番号を入力してください（ハイフン込み）</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--利用料-->
            <div class="form-group row">
                <label for="use_money" 
                       class="col-md-5 col-form-label text-md-left">
                    利用料金
                </label>

                <div class="col-md-5">
                   <input id="use_money" 
                          type="text" 
                          class="form-control 
                                 @error('use_money') is-invalid @enderror" 
                          name="use_money" 
                          value="{{ old('use_money') }}"  
                          autocomplete="off" 
                          autofocus 
                          placeholder="例：2時間500円">

                   @error('use_money')
                    <span class="invalid-feedback" role="alert">
                        <strong>250文字以内で記入してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--弓道場ホームページ-->
            <div class="form-group row">
                <label for="url" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left 
                              @error('url') is-invalid @enderror">
                    弓道場のホームページ
                </label>

                <div class="col-md-5">
                   <input id="url" 
                          type="url" 
                          class="form-control " 
                          name="url" 
                          value="{{ old('url') }}"  
                          autocomplete="off" 
                          autofocus 
                          placeholder="公式ホームページのURLを入力">
                   
                   @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>250文字以内で記入してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--画像アップロード（要確認）-->
            <div class="form-group row">
                <label class="col-md-5 
                              col-form-label 
                              text-md-left 
                              @error('img') is-invalid @enderror">
                    弓道場画像
                </label>
                <div class="col-md-7">
                    @if(empty(old('img')))
                    <div class="imgbox">
                        <input type="file" 
                               multiple
                               class="form-controle-file" 
                               name="img[]"
                               class="img">
                        <a type="button" class="append_imgs">
                            <i class="fa-solid fa-circle-plus"></i>
                        </a>
                        <a type="button" class="remove_imgs">
                            <i class="fa-solid fa-circle-minus"></i>
                        </a>
                    </div>
                    @else
                        @foreach(old('img') as $value)
                            <div class="imgbox">
                                <input type="file" 
                                       multiple
                                       class="form-controle-file img" 
                                       name="img[]"
                                       value="{{$value}}">
                                <button type="button" class="append_imgs">
                                    <i class="fa-solid fa-circle-plus"></i>
                                </button>
                                <button type="button" class="remove_imgs">
                                    <i class="fa-solid fa-circle-minus"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>

                @error('img')
                    <span class="invalid-feedback" role="alert">
                        <strong>選択した画像データは容量を超えています</strong>
                    </span>
                @enderror
            </div>

        </div>
        
        <!--グループ２-->
        @component('components.formtab2')
        @endcomponent
        
        
        <!--グループ３-->
        @component('components.formtab3')
        @endcomponent
    
        
        <!--ボタン-->
        <div class="btn_submit">
            <button type="submit" class="btn btn_check">
                新規登録
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </div>

        
    </form>
</div>

@endsection