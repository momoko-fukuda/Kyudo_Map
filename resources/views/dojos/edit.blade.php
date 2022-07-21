<!--★道場編集ページ-->

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
    <strong class="now">
        <i class="fa-solid fa-bullseye"></i>
        {{$dojo->name}}編集
    </strong>
</div>
<hr>


<div id="edittop">
    <h1>弓道場情報編集</h1>
    <div>
        <h5>～基本情報～</h5>
        <p><span>弓道場名</span>{{$dojo->name}}</p>
        <p><span>住所</span>{{$dojo->area->name}}{{$dojo->address1}}{{$dojo->address2}}</p>
        <p><span>電話番号</span>{{$dojo->tel}}</p>
        
    </div>
    
    <p>
        弓道場の情報が古くなったら、知っている情報を登録してみんなと共有しよう！
        新しい情報へ更新して、正しい情報を元に、みんなと弓道を楽しもう！
    </p>
</div>

<hr>


<div class="formname">
    <h4>{{$dojo->name}}編集フォーム</h4>
    <p><small>最近更新された日時：{{$dojo->updated_at}}</small></p>
</div>

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
            利用条件
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
            施設情報
            <i class="fa-solid fa-circle-chevron-right"></i>
        </a>
      </li>
    </ul>
    
    
    
    <form class="tab-content" 
          id="form_dojocreate" 
          action="/dojos/{{$dojo->id}}" 
          method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        
        <!--グループ１-->
        <div class="tab-pane fade show active" 
             id="item1" 
             role="tabpanel" 
             aria-labelledby="item1-tab">
            
            <!--作成ユーザー-->
            <input type="hidden" name="user_id" value="{{$user->id}}">
            
            
            <!--利用料-->
            <div class="form-group row">
                <label for="use_money" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    利用料金
                </label>

                <div class="col-md-5">
                   <input id="use_money" 
                          type="text" 
                          class="form-control 
                                 @error('use_money') is-invalid @enderror" 
                          name="use_money" 
                          value="{{old('use_money') == '' ? $dojo->use_money : old('use_money')}}"  
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
                </label>

                <div class="col-md-5">
                   <input id="url" 
                          type="text" 
                          class="form-control " 
                          name="url" 
                          value="{{old('url') == '' ? $dojo->url : old('url')}}"  
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
            
            <!--年齢制限-->
            <div class="form-group row">
                <label for="use_age" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    年齢制限
                </label>
    
                <div class="col-md-5">
                   <input id="use_age" 
                          type="text" 
                          class="form-control 
                          　　　　 @error('use_age') is-invalid @enderror" 
                          name="use_age" 
                          value="{{old('use_age') == '' ? $dojo->use_age : old('use_age')}}" 
                          autocomplete="off" 
                          autofocus 
                          placeholder="例：10（※10歳以上の場合）">   
    
                   @error('use_age')
                    <span class="invalid-feedback" role="alert">
                        <strong>制限のある年齢を数字のみで入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
             <!--段数制限-->
            <div class="form-group row">
                <label for="use_step" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    段資格の制限
                </label>

                <div class="col-md-5">
                    <select id="use_step" 
                            class="form-control" 
                            name="use_step" 
                            autofocus>
                        <option disabled 
                                selected 
                                style="display:none;">
                            段数を選択してください
                        </option>
                        <option value="不明・無指定" 
                                      {{ '不明・無指定' == old('use_step', $dojo->use_step) ? 'selected' : '' }}>
                            不明・無指定
                        </option>
                        <option value="初段" 
                                      {{ '初段' == old('use_step', $dojo->use_step) ? 'selected' : '' }}>
                            初段
                        </option>
                        <option value="弐段" 
                                      {{ '弐段' == old('use_step', $dojo->use_step) ? 'selected' : '' }}>
                            弐段
                        </option>
                        <option value="参段" 
                                      {{ '参段' == old('use_step', $dojo->use_step) ? 'selected' : '' }}>
                            参段
                        </option>
                        <option value="四段" 
                                      {{ '四段' == old('use_step', $dojo->use_step) ? 'selected' : '' }}>
                            四段
                        </option>
                        <option value="五段" 
                                      {{ '五段' == old('use_step', $dojo->use_step) ? 'selected' : '' }}>
                            五段
                        </option>
                        <option value="六段" 
                                      {{ '六段' == old('use_step', $dojo->use_step) ? 'selected' : '' }}>
                            六段
                        </option>
                        <option value="七段" 
                                       {{ '七段' == old('use_step', $dojo->use_step) ? 'selected' : '' }}>
                            七段
                        </option>
                        <option value="八段" 
                                      {{ '八段' == old('use_step', $dojo->use_step) ? 'selected' : '' }}>
                            八段
                        </option>
                    </select>
                </div>
            </div>
            
            <!--個人利用可否-->
            <div class="form-group row">
                <label class="col-md-5 
                              col-form-label 
                              text-md-left">
                    個人利用
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_personal" 
                           id="use_personal3" 
                           checked = "checked"
                           value="不明"
                                  {{ old('use_personal', $dojo->use_personal) == '不明' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_personal3">
                        不明
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_personal" 
                           id="use_personal1" 
                           value="可能"
                                 {{ old('use_personal', $dojo->use_personal) == '可能' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_personal1">
                        可能
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_personal" 
                           id="use_personal2" 
                           value="不可"
                                 {{ old('use_personal', $dojo->use_personal) == '不可' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_personal2">
                        不可
                    </label>
                </div>
            </div>
            
            <!--団体利用可否-->
            <div class="form-group row">
                <label class="col-md-5 
                              col-form-label 
                              text-md-left">
                    団体利用
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_group" 
                           id="use_group3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('use_group', $dojo->use_group) == '不明' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_group3">
                        不明
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_group" 
                           id="use_group1" 
                           value="可能"
                                 {{ old('use_group', $dojo->use_group) == '可能' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_group1">
                        可能
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_group" 
                           id="use_group2" 
                           value="不可"
                                 {{ old('use_group', $dojo->use_group) == '不可' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_group2">
                        不可
                    </label>
                </div>
            </div>
            
            <!--連盟/団体所属要否-->
            <div class="form-group row">
                <label class="col-md-5 
                              col-form-label 
                              text-md-left">
                    連盟/団体への所属要否
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_affiliation" 
                           id="use_affiliation3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('use_affiliation', $dojo->use_affiliation) == '不明' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_affiliation3">
                        不明
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_affiliation" 
                           id="use_affiliation1" 
                           value="必要"
                                 {{ old('use_affiliation', $dojo->use_affiliation) == '必要' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_affiliation1">
                        必要
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_affiliation" 
                           id="use_affiliation2" 
                           value="不要"
                                 {{ old('use_affiliation', $dojo->use_affiliation) == '不要' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_affiliation2">
                        不要
                    </label>
                </div>
            </div>
            
            <!--予約の要否-->
            <div class="form-group row">
                <label class="col-md-5 
                              col-form-label 
                              text-md-left">
                    事前予約の要否
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_reserve" 
                           id="use_reserve3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('use_reserve', $dojo->use_reserve) == '不明' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_reserve3">
                        不明
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_reserve" 
                           id="use_reserve1" 
                           value="必要"
                                 {{ old('use_reserve', $dojo->use_reserve) == '必要' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_reserve1">
                        必要
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="use_reserve" 
                           id="use_reserve2" 
                           value="不要"
                                 {{ old('use_reserve', $dojo->use_reserve) == '不要' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="use_reserve2">
                        不要
                    </label>
                </div>
            </div>
            
            <!--人数制限-->
            <div class="form-group row">
                <label for="facility_numberlimit" 
                       class="col-md-5 col-form-label text-md-left">
                    人数制限
                </label>
    
                <div class="col-md-5">
                   <input id="facility_numberlimit" 
                          type="text" 
                          class="form-control 
                                 @error('facility_numberlimit') is-invalid @enderror" 
                          name="facility_numberlimit" 
                          value="{{old('facility_numberlimit') == '' ? $dojo->facility_numberlimit : old('facility_numberlimit')}}" 
                          autocomplete="off" 
                          autofocus 
                          placeholder="人数の制限がある場合、条件を入力してください">
    
                   @error('facility_numberlimit')
                    <span class="invalid-feedback" role="alert">
                        <strong>入力できる文字数は20文字までになります</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        
        
        
        <!--グループ2-->
        @component('components.formedittab2', ['dojo' => $dojo, 'businesshour'=>$businesshour])
        @endcomponent
        
        
        <!--ボタン-->
        <div class="btn_submit">
            <button type="submit" class="btn btn_check w-50" id="btn_submit">
                変更を登録
                <i class="fa-solid fa-file-pen"></i>
            </button>
        </div>
        
        
        
    </form>

</div>




@endsection