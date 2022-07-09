<!--★道場編集ページ-->

@extends('layouts.app')

@section('content')

<!--パンくずリスト-->
<div>
    <div>
        <a href="{{route('home')}}">Home</a>>
        <a href="{{route('dojos.index')}}">弓道場検索</a>>
        <a href="/dojos/{{$dojo->id}}">{{$dojo->name}}詳細</a>>
        <strong class="now">{{$dojo->name}}編集</strong>
    </div>
</div>

<div>
    <h1>弓道場編集画面</h1>
    <div>
        <p><span>弓道場名：</span>{{$dojo->name}}</p>
        <p><span>住所：</span>{{$dojo->area->name}}{{$dojo->address1}}{{$dojo->address2}}</p>
        <p><span>電話番号：</span>{{$dojo->tel}}</p>
        <p><small>最近更新された日時：{{$dojo->updated_at}}</small></p>
    </div>
    
    <h4>登録されている弓道場の情報が古い場合、知っている情報を登録してみんなと共有しよう！<br>
    新しい情報へ更新して、正しい情報を元に、みんなと弓道を楽しもう！</h4>
    <p>※登録後、弓道のTEBIKI管理者で登録された道場の内容を確認させていただきます。<br>
    内容を確認し、実在しない、または虚偽内容がある場合、削除する可能性がございます。</p>
</div>

<hr>
<div>
    <h4>{{$dojo->name}}編集フォーム</h4>
    
    <form id="form_dojocreate" action="/dojos/{{$dojo->id}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        
        <!--グループ１-->
        <div>
            
            <!--作成ユーザー-->
            <input type="hidden" name="user_id" value="{{$user->id}}">
            
            
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
                    <span class="ml-1">任意</span>
                </label>

                <div class="col-md-5">
                   <input id="url" 
                          type="text" 
                          class="form-control " 
                          name="url" 
                          value="{{old('url') == '' ? $dojo->url : old('url')}}"  
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
            <!--年齢制限-->
            <div class="form-group row">
                <label for="use_age" 
                       class="col-md-5 col-form-label text-md-left">
                    年齢制限
                    <span class="ml-1">任意</span>
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
                          placeholder="（例：10）※10歳以上の場合">   
    
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
                       class="col-md-5 col-form-label text-md-left">
                    段制限
                    <span class="ml-1">任意</span>
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
                        
                            <option value="不明・無指定"　@if( '不明・無指定' == old('use_step', $dojo->use_step)) selected @endif>不明・無指定</option>
                            <option value="初段" @if( '初段' == old('use_step', $dojo->use_step)) selected @endif>初段</option>
                            <option value="弐段" @if( '弐段' == old('use_step', $dojo->use_step)) selected @endif>弐段</option>
                            <option value="参段" @if( '参段' == old('use_step', $dojo->use_step)) selected @endif>参段</option>
                            <option value="四段" @if( '四段' == old('use_step', $dojo->use_step)) selected @endif>四段</option>
                            <option value="五段" @if( '五段' == old('use_step', $dojo->use_step)) selected @endif>五段</option>
                            <option value="六段" @if( '六段' == old('use_step', $dojo->use_step)) selected @endif>六段</option>
                            <option value="七段" @if( '七段' == old('use_step', $dojo->use_step)) selected @endif>七段</option>
                            <option value="八段" @if( '八段' == old('use_step', $dojo->use_step)) selected @endif>八段</option>
                    </select>
                </div>
            </div>
            <!--個人利用可否-->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">
                    個人利用
                    <span class="ml-1">任意</span>
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
                <label class="col-md-4 col-form-label text-md-left">
                    団体利用
                    <span class="ml-1">任意</span>
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
                <label class="col-md-4 col-form-label text-md-left">
                    連盟/団体への所属要否
                    <span class="ml-1">任意</span>
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
                <label class="col-md-4 col-form-label text-md-left">
                    事前予約の要否
                    <span class="ml-1">任意</span>
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
        </div>
        
        
        
        <!--グループ３-->
        @include('components.formedittab2', ['dojo' => $dojo])
        
        
        <!--ボタン-->
        <div class="form-group">
            <button type="submit" class="btn btn-primary w-50" id="btn_submit">
                変更を登録
            </button>
            <p>※step1~step3入力後、登録ボタンを押してください</p>
        </div>
        
        
        
    </form>

</div>




@endsection