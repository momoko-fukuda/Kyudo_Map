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
    <p>
        「弓道場のTEBIKI」に、まだ掲載されていない弓道場を登録して、みんなと共有しよう！
        みんなで共有し合うことで、まだあなたの知らない弓道場に巡り合えるかもしれません。</p>
</div>


<hr>



<h4 class="formname">弓道場登録フォーム</h4>
<!--バリデーションエラー-->
@if($errors->any())
    <div class="alert alert-danger">
        エラー項目があります。
        <br>各項目のエラー内容を確認してください。
    </div>
@endif




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
        <div class="tab-pane fade show active" 
             id="item1" 
             role="tabpanel" 
             aria-labelledby="item1-tab">

            <!--作成ユーザー-->
            <input type="hidden" 
                   name="user_id" 
                   value="{{$user->id}}">
            
            <!--道場名-->
            <div class="form-group row">
                <label for="name" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    道場名
                       <span class="ml-1 required">必須</span>
                </label>

                <div class="col-md-7 flex-grow-1">
                   <input id="name" 
                          type="text" 
                          class="form-control
                                 @error('name') is-invalid @enderror" 
                          name="name" 
                          value="{{ old('name') }}"
                          autocomplete="name" 
                          autofocus
                          placeholder="サンプル弓道場/スポーツセンター">

                   @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                    @endif
                   
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

                <div class="col-md-7 flex-grow-1">
                    <select id="area_id" 
                            class="form-control
                                   @error('area_id') is-invalid @enderror" 
                            name="area_id" 
                            autofocus>
                        <option disabled 
                                selected 
                                style="display:none;">
                            都道府県を選択
                        </option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" 
                                    @if( $area->id == old('area_id')) selected @endif>
                                {{$area->name}}
                            </option>
                        @endforeach
                    </select>
                        
                    @if($errors->has('area_id'))
                            @foreach($errors->get('area_id') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                    @endif
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

                <div class="col-md-7 flex-grow-1">
                   <input id="address1" 
                          type="text" 
                          class="form-control
                                 @error('address1') is-invalid @enderror" 
                          name="address1" 
                          value="{{ old('address1') }}"
                          autocomplete="address-level2" 
                          autofocus 
                          placeholder="市区町村名を記入">

                   @if($errors->has('address1'))
                            @foreach($errors->get('address1') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                    @endif
                </div>
            </div>
            <!--住所（市区町村以下）-->
            <div class="form-group row">
                <label for="address2" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    住所③（建物・ビル名等）
                    <span class="ml-1 required">必須</span>
                </label>

                <div class="col-md-7 flex-grow-1">
                   <input id="address2" 
                          type="text" 
                          class="form-control
                                 @error('address2') is-invalid @enderror" 
                          name="address2" 
                          value="{{ old('address2') }}"
                          autocomplete="address-level3" 
                          autofocus 
                          placeholder="建物名・ビル名を記入">

                   @if($errors->has('address2'))
                            @foreach($errors->get('address2') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                    @endif
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

                <div class="col-md-7 flex-grow-1">
                   <input id="tel" 
                          type="text" 
                          class="form-control
                                 @error('tel') is-invalid @enderror" 
                          name="tel" 
                          value="{{ old('tel') }}"
                          autocomplete="tel" 
                          autofocus 
                          placeholder="例：03-0000-0000">

                   @if($errors->has('tel'))
                            @foreach($errors->get('tel') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                    @endif
                </div>
            </div>
            
            <!--弓道場ホームページ-->
            <div class="form-group row">
                <label for="url" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    弓道場のホームページ
                </label>

                <div class="col-md-7 flex-grow-1">
                   <input id="url" 
                          type="url" 
                          class="form-control
                                @error('url') is-invalid @enderror" 
                          name="url" 
                          value="{{ old('url') }}"  
                          autocomplete="url" 
                          autofocus 
                          placeholder="公式ホームページのURLを入力">
                   
                   @if($errors->has('url'))
                            @foreach($errors->get('url') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                    @endif
                </div>
            </div>
            <!--利用料-->
            <div class="form-group row">
                <label for="use_money" 
                       class="col-md-5 col-form-label text-md-left">
                    利用料金
                </label>

                <div class="col-md-7 flex-grow-1">
                   <input id="use_money" 
                          type="text" 
                          class="form-control
                                 @error('use_money') is-invalid @enderror" 
                          name="use_money" 
                          value="{{ old('use_money') }}"  
                          autocomplete="off" 
                          autofocus 
                          placeholder="例：2時間500円">

                   @if($errors->has('use_money'))
                            @foreach($errors->get('use_money') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                    @endif
                </div>
            </div>
            <!--画像アップロード（要確認）-->
            <div class="form-group row">
                <label class="col-md-5 
                              col-form-label 
                              text-md-left">
                    弓道場画像<small>(約5枚~10枚まで可※容量10MB)</small>
                </label>
                <div class="col-md-7">
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
                </div>

                    @foreach($errors->get('img.*') as $messages)
                        @foreach($messages as $message)
                            <small class="d-block 
                                          text-danger ">
                                {{$message}}
                            </small>
                        @endforeach
                    @endforeach
               
                
                
            </div>

        </div>
        
        <!--グループ２-->
        @component('components.formtab2')
        @endcomponent
        
        
        <!--グループ３-->
        @component('components.formtab3')
        @endcomponent
    
        
        <!--ボタン-->
        <small class="text-danger">
            ※「基本情報」「利用条件」「施設情報」を確認の上、新規登録ボタンを押してください。
        </small>
        <div class="btn_submit">
            
            <button type="submit" class="btn btn_check">
                新規登録
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </div>

        
    </form>

</div>


@endsection