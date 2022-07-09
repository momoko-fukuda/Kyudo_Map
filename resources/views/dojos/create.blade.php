<!--★道場新規登録画面--->


@extends('layouts.app')

@section('content')

<!--パンくずリスト-->
<div>
    <div>
        <a href="{{route('home')}}">Home</a>>
        <strong class="now">新規弓道場作成</strong>
    </div>
</div>


<div>
    <h1>新規弓道場登録</h1>
    <h4>弓道のTEBIKIに、まだ掲載されていない弓道場を登録して、みんなと共有しよう！<br>
    みんなと共有することで、まだあなたの知らない弓道場に巡り合えるかも？</h4>
    <p>※登録後、弓道のTEBIKI管理者で登録された道場の内容を確認させていただきます。<br>
    内容を確認し、実在しない、または虚偽内容がある場合、削除する可能性がございます。</p>
</div>


<hr>
<div>
    <h4 class="mt-5">新規弓道場登録フォーム</h4>
    
    <form id="form_dojocreate" action="/dojos" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        
        <!--グループ１-->
        <div>

            <!--作成ユーザー-->
            <input type="hidden" name="user_id" value="{{$user->id}}">
            
            <!--道場名-->
            <div class="form-group row">
                <label for="name" 
                       class="col-md-5 col-form-label text-md-left">道場名
                       <span class="ml-1">必須</span>
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
                          autofocus placeholder="サンプル弓道場">

                   @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>道場名を入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--住所（都道府県）-->
            <div class="form-group row">
                <label for="area_id" 
                       class="col-md-5 col-form-label text-md-left">住所①（都道府県）
                       <span class="ml-1">必須</span>
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
                            都道府県を選択してください
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
                       class="col-md-5 col-form-label text-md-left">
                    住所②（市区町村）
                    <span class="ml-1">必須</span>
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
                          placeholder="市区町村名を記入してください">

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
                       class="col-md-5 col-form-label text-md-left">
                    住所③（建物名・ビル名など）
                    <span class="ml-1">必須</span>
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
                          placeholder="建物名・ビル名を記入してください">

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
                       class="col-md-5 col-form-label text-md-left">
                    電話番号
                    <span class="ml-1">必須</span>
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
                          placeholder="電話番号を入力してください（例：03-0000-0000）">

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
                    <span class="ml-1">任意</span>
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
                          placeholder="利用料金を入力してください（例：2時間500円）">

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
                    <span class="ml-1">任意</span>
                </label>

                <div class="col-md-5">
                   <input id="url" 
                          type="text" 
                          class="form-control " 
                          name="url" 
                          value="{{ old('url') }}"  
                          autocomplete="off" 
                          autofocus 
                          placeholder="弓道場の公式ホームページのURLを入力してください">
                   
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
                    <span class="ml-1">任意</span>
                </label>
                <div>
                    <input type="file" 
                           multiple
                           class="form-controle-file" 
                           name="img[]" 
                           value="{{ old('img') }}">
                    <input type="file" 
                           multiple
                           class="form-controle-file" 
                           name="img[]" 
                           value="{{ old('img') }}">
                    <input type="file" 
                           multiple
                           class="form-controle-file" 
                           name="img[]" 
                           value="{{ old('img') }}">
                    <input type="file" 
                           multiple
                           class="form-controle-file" 
                           name="img[]" 
                           value="{{ old('img') }}">
                    <input type="file" 
                           multiple
                           class="form-controle-file" 
                           name="img[]" 
                           value="{{ old('img') }}">
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
        <div class="form-group">
            <button type="submit" class="btn btn-primary w-50" id="btn_submit">
                新規登録
            </button>
            <p>※step1~step3入力後、登録ボタンを押してください</p>
        </div>

        
    </form>
</div>

@endsection