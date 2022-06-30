<!--★道場新規登録画面--->


@extends('layouts.app')

@section('content')

<div>
    <h1>新規弓道場登録</h1>
    <h4>弓道のTEBIKIに、まだ掲載されていない弓道場を登録して、みんなと共有しよう！<br>
    みんなと共有することで、まだあなたの知らない弓道場に巡り合えるかも？</h4>
    <p>※登録後、弓道のTEBIKI管理者で登録された道場の内容を確認させていただきます。<br>
      内容を確認し、実在しない、または虚偽内容がある場合、削除する可能性がございます。</p>
</div>





<h4 class="mt-5">新規弓道場登録フォーム</h4>







<form method="POST" action="{{ route('dojos.store') }}" enctype="multipart/form-data">
    @csrf
    <!--フォームタブの部分-->
    <ul class="nav nav-tabs nav-justified nav-pills" role="tablist">
        <li class="nav-item">
           <a class="nav-link active" id="item1-tab" data-toggle="tab" href="#item1" role="tab" aria-controls="item1" aria-selected="true">登録step１＞<br>基本情報(必須)</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" id="item2-tab" data-toggle="tab" href="#item2" role="tab" aria-controls="item2" aria-selected="false">登録step2＞<br>詳細情報（任意）</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" id="item3-tab" data-toggle="tab" href="#item3" role="tab" aria-controls="item3" aria-selected="false">登録step3＞<br>営業情報（任意）</a>
        </li>
    </ul>
    


    
    <div class="tab-content">
        
        <!--タブの内容１-->
        <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
            <!--道場名-->
            <div class="form-group row">
                <label for="name" class="col-md-5 col-form-label text-md-left">道場名<span class="ml-1">必須</span></label>

                <div class="col-md-5">
                   <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="サンプル弓道場">

                   @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>道場名を入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            <!--住所（都道府県）-->
            <div class="form-group row">
                <label for="area_id" class="col-md-5 col-form-label text-md-left">住所①（都道府県）<span class="ml-1">必須</span></label>

                <div class="col-md-5">
                    <select id="area_id" class="form-control @error('area_id') is-invalid @enderror" name="area_id" required autocomplete="address-level1">
                        <option value="" disabled selected style="display:none;">都道府県を選択してください</option>
                        @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>
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
                <label for="address1" class="col-md-5 col-form-label text-md-left">住所②（市区町村）<span class="ml-1">必須</span></label>

                <div class="col-md-5">
                   <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}" required autocomplete="address-level2" autofocus placeholder="市区町村名を記入してください">

                   @error('address1')
                    <span class="invalid-feedback" role="alert">
                        <strong>市区町村名を入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            <!--住所（市区町村以下）-->
            <div class="form-group row">
                <label for="address2" class="col-md-5 col-form-label text-md-left">住所③（建物名・ビル名など）<span class="ml-1">必須</span></label>

                <div class="col-md-5">
                   <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" required autocomplete="address-level3" autofocus placeholder="建物名・ビル名を記入してください">

                   @error('address2')
                    <span class="invalid-feedback" role="alert">
                        <strong>建物名・ビル名などを入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <!--電話番号-->
            <div class="form-group row">
                <label for="tel" class="col-md-5 col-form-label text-md-left">電話番号<span class="ml-1">必須</span></label>

                <div class="col-md-5">
                   <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus placeholder="電話番号を入力してください（例：03-0000-0000）">

                   @error('tel')
                    <span class="invalid-feedback" role="alert">
                        <strong>電話番号を入力してください（ハイフン込み）</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            <!--利用料-->
            <div class="form-group row">
                <label for="use_money" class="col-md-5 col-form-label text-md-left">利用料金<span class="ml-1">必須</span></label>

                <div class="col-md-5">
                   <input id="use_money" type="text" class="form-control @error('use_money') is-invalid @enderror" name="use_money" value="{{ old('use_money') }}"  autocomplete="off" autofocus placeholder="利用料金を入力してください（例：2時間500円）">

                   @error('use_money')
                    <span class="invalid-feedback" role="alert">
                        <strong>利用料金（目安）を入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--弓道場ホームページ-->
            <div class="form-group row">
                <label for="url" class="col-md-5 col-form-label text-md-left @error('url') is-invalid @enderror">弓道場のホームページ<span class="ml-1">任意</span></label>

                <div class="col-md-5">
                   <input id="url" type="text" class="form-control " name="url" value="{{ old('url') }}"  autocomplete="off" autofocus placeholder="弓道場の公式ホームページのURLを入力してください">
                   
                   @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>入力内容に誤りがあります</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            <!--画像アップロード-->
            <div class="form-group row">
                <label for="img" class="col-md-5 col-form-label text-md-left @error('img') is-invalid @enderror">弓道場画像<span class="ml-1">任意</span></label>
                <input type="file" multiple id="img" class="form-controle-file" name="img[]" value="{{ old('img') }}">
                
                @error('img')
                    <span class="invalid-feedback" role="alert">
                        <strong>選択した画像データは容量を超えています</strong>
                    </span>
                @enderror
            </div>

        </div>
        
        
        <!--タブ内容２-->
        <div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
            <!--年齢制限-->
            <div class="form-group row">
                <label for="use_age" class="col-md-5 col-form-label text-md-left">年齢制限<span class="ml-1">任意</span></label>
    
                <div class="col-md-5">
                   <input id="use_age" type="text" class="form-control @error('use_age') is-invalid @enderror" name="use_age" value="{{ old('use_age') }}" autocomplete="off" autofocus placeholder="（例：10）※10歳以上の場合">
    
                   @error('use_age')
                    <span class="invalid-feedback" role="alert">
                        <strong>制限のある年齢を数字のみで入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--段数制限-->
            <div class="form-group row">
                <label for="use_step" class="col-md-5 col-form-label text-md-left">段数制限<span class="ml-1">任意</span></label>

                <div class="col-md-5">
                    <select id="use_step" class="form-control" name="use_step" autocomplete="off">
                        <option value="" disabled selected style="display:none;">段数を選択してください</option>
                            <option>不明・無指定</option>
                            <option>初段</option>
                            <option>弐段</option>
                            <option>参段</option>
                            <option>四段</option>
                            <option>五段</option>
                            <option>六段</option>
                            <option>七段</option>
                            <option>八段</option>
                    </select>
                </div>
            </div>
            
            <!--個人利用可否-->
            <div>
                <label for="use_personal" class="col-md-4 col-form-label text-md-left">個人利用<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_personal" id="use_personal" value="可能">
                    <label class="form-check-label" for="use_personal">可能</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_personal" id="use_personal" value="不可">
                    <label class="form-check-label" for="use_personal">不可</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_personal" id="use_personal" value="不明">
                    <label class="form-check-label" for="use_personal">不明</label>
                </div>
            </div>
            <!--団体利用可否-->
            <div>
                <label for="use_group" class="col-md-4 col-form-label text-md-left">団体利用<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_group" id="use_group" value="可能">
                    <label class="form-check-label" for="use_group">可能</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_group" id="use_group" value="不可">
                    <label class="form-check-label" for="use_group">不可</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_group" id="use_group" value="不明">
                    <label class="form-check-label" for="use_group">不明</label>
                </div>
            </div>
            <!--連盟/団体所属要否-->
            <div>
                <label for="use_affiliation" class="col-md-4 col-form-label text-md-left">連盟/団体所属要否<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_affiliation" id="use_affiliation" value="必要">
                    <label class="form-check-label" for="use_affiliation">必要</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_affiliation" id="use_affiliation" value="不要">
                    <label class="form-check-label" for="use_affiliation">不要</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_affiliation" id="use_affiliation" value="不明">
                    <label class="form-check-label" for="use_affiliation">不明</label>
                </div>
            </div>
            
            
            <!--予約の要否-->
            <div>
                <label for="use_reserve" class="col-md-4 col-form-label text-md-left">事前予約の要否<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_reserve" id="use_reserve" value="必要">
                    <label class="form-check-label" for="use_affiliation">必要</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_reserve" id="use_reserve" value="不要">
                    <label class="form-check-label" for="use_reserve">不要</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_reserve" id="use_reserve" value="不明">
                    <label class="form-check-label" for="use_reserve">不明</label>
                </div>
            </div>
            <!--屋内/屋外-->
            <div>
                <label for="facility_inout" class="col-md-4 col-form-label text-md-left">室内/屋外<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_inout" id="facility_inout" value="室内">
                    <label class="form-check-label" for="facility_inout">室内</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_inout" id="facility_inout" value="屋外">
                    <label class="form-check-label" for="facility_inout">屋外</label>
                </div>
            </div>
            <!--巻藁あり/なし-->
            <div>
                <label for="facility_makiwara" class="col-md-4 col-form-label text-md-left">巻藁<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_makiwara" id="facility_makiwara" value="あり">
                    <label class="form-check-label" for="facility_makiwara">あり</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_makiwara" id="facility_makiwara" value="なし">
                    <label class="form-check-label" for="facility_makiwara">なし</label>
                </div>
            </div>
            <!--冷暖房あり/なし-->
            <div>
                <label for="facility_aircondition" class="col-md-4 col-form-label text-md-left">冷暖房<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_aircondition" id="facility_aircondition" value="あり">
                    <label class="form-check-label" for="facility_aircondition">あり</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_aircondition" id="facility_aircondition" value="なし">
                    <label class="form-check-label" for="facility_aircondition">なし</label>
                </div>
            </div>
            <!--的数-->
            <div class="form-group row">
                <label for="facility_matonumber" class="col-md-5 col-form-label text-md-left">的数<span class="ml-1">任意</span></label>
    
                <div class="col-md-5">
                   <input id="facility_matonumber" type="text" class="form-control @error('facility_matonumber') is-invalid @enderror" name="facility_matonumber" value="{{ old('facility_matonumber') }}" autocomplete="off" autofocus placeholder="（例：5）※的数5つの場合">
    
                   @error('facility_matonumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>的数を数字で入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--更衣室あり/なし-->
            <div>
                <label for="facility_lockerroom" class="col-md-4 col-form-label text-md-left">更衣室<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_lockerroom" id="facility_lockerroom" value="あり">
                    <label class="form-check-label" for="facility_lockerroom">あり</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_lockerroom" id="facility_lockerroom" value="なし">
                    <label class="form-check-label" for="facility_lockerroom">なし</label>
                </div>
            </div>
            <!--人数制限-->
            <div class="form-group row">
                <label for="facility_numberlimit" class="col-md-5 col-form-label text-md-left">人数の制限<span class="ml-1">任意</span></label>
    
                <div class="col-md-5">
                   <input id="facility_numberlimit" type="text" class="form-control @error('facility_numberlimit') is-invalid @enderror" name="facility_numberlimit" value="{{ old('facility_numberlimit') }}" autocomplete="off" autofocus placeholder="人数の制限がある場合、入力してください">
    
                   @error('facility_numberlimit')
                    <span class="invalid-feedback" role="alert">
                        <strong>入力できる文字数は20文字までになります</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            <!--駐車場あり/なし-->
            <div>
                <label for="facility_parking" class="col-md-4 col-form-label text-md-left">駐車場<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_parking" id="facility_parking" value="施設内にあり">
                    <label class="form-check-label" for="facility_parking">施設内にあり</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_parking" id="facility_parking" value="なし">
                    <label class="form-check-label" for="facility_parking">なし</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="facility_parking" id="facility_parking" value="施設外の近くにあり">
                    <label class="form-check-label" for="facility_parking">施設外の近くにあり</label>
                </div>
            </div>
            
            
        </div>
        

        <!--タブ内容3-->
        <div class="tab-pane fade" id="item3" role="tabpanel" aria-labelledby="item3-tab">
            <!--定休日-->
            <div>
                <label for="holiday" class="col-md-4 col-form-label text-md-left">定休日<span class="ml-1">任意</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="holiday[0][holiday]" id="holiday" value="月曜日">
                    <label class="form-check-label" for="holiday">月曜日</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="holiday[1][holiday]" id="holiday" value="火曜日">
                    <label class="form-check-label" for="holiday">火曜日</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="holiday[2][holiday]" id="holiday" value="水曜日">
                    <label class="form-check-label" for="holiday">水曜日</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="holiday[3][holiday]" id="holiday" value="木曜日">
                    <label class="form-check-label" for="holiday">木曜日</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="holiday[4][holiday]" id="holiday" value="金曜日">
                    <label class="form-check-label" for="holiday">金曜日</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="holiday[5][holiday]" id="holiday" value="土曜日">
                    <label class="form-check-label" for="holiday">土曜日</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="holiday[6][holiday]" id="holiday" value="日曜日">
                    <label class="form-check-label" for="holiday">日曜日</label>
                </div>
            </div>
            
            <!--営業時間-->
            <div class="form-group row">
                <label for="from" class="col-md-4 col-form-label text-md-left">営業時間(区分1)<span class="ml-1">任意</span></label>
                <div>
                開始時間<input type="time" name="from[0][from]" id="from">
                終了時間<input type="time" name="to[0][to]" id="to">
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-md-4 col-form-label text-md-left">営業時間(区分２)<span class="ml-1">任意</span></label>
                <div>
                開始時間<input type="time" name="from[1][from]" id="from">
                終了時間<input type="time" name="to[1][to]" id="to">
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-md-4 col-form-label text-md-left">営業時間(区分３)<span class="ml-1">任意</span></label>
                <div>
                開始時間<input type="time" name="from[2][from]" id="from">
                終了時間<input type="time" name="to[2][to]" id="to">
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-md-4 col-form-label text-md-left">営業時間(区分４)<span class="ml-1">任意</span></label>
                <div>
                開始時間<input type="time" name="from[3][from]" id="from">
                終了時間<input type="time" name="to[3][to]" id="to">
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-md-4 col-form-label text-md-left">営業時間(区分５)<span class="ml-1">任意</span></label>
                <div>
                開始時間<input type="time" name="from[4][from]" id="from">
                終了時間<input type="time" name="to[4][to]" id="to">
                </div>
            </div>

            
            <!--備考-->
            <div class="form-group row">
                <label for="other" class="col-md-5 col-form-label text-md-left">備考<span class="ml-1">任意</span></label>
    
                <div class="col-md-5">
                   <textarea id="other" class="form-control @error('other') is-invalid @enderror" name="other" value="{{ old('other') }}" autocomplete="on" autofocus placeholder="その他、利用する上での注意事項を記入してください"></textarea>
    
                   @error('other')
                    <span class="invalid-feedback" role="alert">
                        <strong>255文字以内で入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary w-50">
            新規登録
        </input>
        <p>※step1~step3入力後、登録ボタンを押してください</p>
    </div>
</form>


@endsection