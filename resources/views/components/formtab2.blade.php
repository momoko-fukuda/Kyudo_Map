<!--グループ２-->
        <div>
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
                          value="{{ old('use_age') }}" 
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
                        
                            <option value="不明・無指定"　@if( '不明・無指定' == old('use_step')) selected @endif>不明・無指定</option>
                            <option value="初段" @if( '初段' == old('use_step')) selected @endif>初段</option>
                            <option value="弐段" @if( '弐段' == old('use_step')) selected @endif>弐段</option>
                            <option value="参段" @if( '参段' == old('use_step')) selected @endif>参段</option>
                            <option value="四段" @if( '四段' == old('use_step')) selected @endif>四段</option>
                            <option value="五段" @if( '五段' == old('use_step')) selected @endif>五段</option>
                            <option value="六段" @if( '六段' == old('use_step')) selected @endif>六段</option>
                            <option value="七段" @if( '七段' == old('use_step')) selected @endif>七段</option>
                            <option value="八段" @if( '八段' == old('use_step')) selected @endif>八段</option>
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
                                 {{ old('use_personal') == '不明' ? 'checked' : '' }}>
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
                                 {{ old('use_personal') == '可能' ? 'checked' : '' }}>
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
                                 {{ old('use_personal') == '不可' ? 'checked' : '' }}>
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
                                 {{ old('use_group') == '不明' ? 'checked' : '' }}>
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
                                 {{ old('use_group') == '可能' ? 'checked' : '' }}>
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
                                 {{ old('use_group') == '不可' ? 'checked' : '' }}>
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
                                 {{ old('use_affiliation') == '不明' ? 'checked' : '' }}>
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
                                 {{ old('use_affiliation') == '必要' ? 'checked' : '' }}>
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
                                 {{ old('use_affiliation') == '不要' ? 'checked' : '' }}>
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
                                 {{ old('use_reserve') == '不明' ? 'checked' : '' }}>
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
                                 {{ old('use_reserve') == '必要' ? 'checked' : '' }}>
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
                                 {{ old('use_reserve') == '不要' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="use_reserve2">
                        不要
                    </label>
                </div>
                
                
            </div>
            <!--屋内/屋外-->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">
                    屋内/屋外
                    <span class="ml-1">任意</span>
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_inout" 
                           id="facility_inout3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_inout') == '不明' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_inout3">
                        不明
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_inout" 
                           id="facility_inout1" 
                           value="屋内"
                                 {{ old('facility_inout') == '屋内' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_inout1">
                        屋内
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_inout" 
                           id="facility_inout2" 
                           value="屋外"
                                 {{ old('facility_inout') == '屋外' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_inout2">
                        屋外
                    </label>
                </div>
                
                
            </div>
            <!--巻藁あり/なし-->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">
                    巻藁
                    <span class="ml-1">任意</span>
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_makiwara" 
                           id="facility_makiwara3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_makiwara') == '不明' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_makiwara3">
                        不明
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_makiwara" 
                           id="facility_makiwara1" 
                           value="あり"
                                 {{ old('facility_makiwara') == 'あり' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_makiwara1">
                        あり
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_makiwara" 
                           id="facility_makiwara2" 
                           value="なし"
                                 {{ old('facility_makiwara') == 'なし' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_makiwara2">
                        なし
                    </label>
                </div>
                
                
            </div>
            <!--冷暖房あり/なし-->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">
                    冷暖房設備
                    <span class="ml-1">任意</span>
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_aircondition" 
                           id="facility_aircondition3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_aircondition') == '不明' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_aircondition3">
                        不明
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_aircondition" 
                           id="facility_aircondition1" 
                           value="あり"
                                 {{ old('facility_aircondition') == 'あり' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_aircondition1">
                        あり
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_aircondition" 
                           id="facility_aircondition2" 
                           value="なし"
                                 {{ old('facility_aircondition') == 'なし' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_aircondition2">
                        なし
                    </label>
                </div>
                
                
            </div>
            <!--的数-->
            <div class="form-group row">
                <label for="facility_matonumber" 
                       class="col-md-5 col-form-label text-md-left">
                    的数
                    <span class="ml-1">任意</span>
                </label>
    
                <div class="col-md-5">
                   <input id="facility_matonumber" 
                          type="text" 
                          class="form-control 
                                 @error('facility_matonumber') is-invalid @enderror" 
                          name="facility_matonumber" 
                          value="{{ old('facility_matonumber') }}" 
                          autocomplete="off" 
                          autofocus 
                          placeholder="（例：5）※的数5つの場合">
    
                   @error('facility_matonumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>的の数を数字で入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--更衣室あり/なし-->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">
                    更衣室
                    <span class="ml-1">任意</span>
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_lockerroom" 
                           id="facility_lockerroom3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_lockerroom') == '不明' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_lockerroom3">
                        不明
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_lockerroom" 
                           id="facility_lockerroom1" 
                           value="あり"
                                 {{ old('facility_lockerroom') == 'あり' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_lockerroom1">
                        あり
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_lockerroom" 
                           id="facility_lockerroom2" 
                           value="なし"
                                 {{ old('facility_lockerroom') == 'なし' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_lockerroom2">
                        なし
                    </label>
                </div>
                
                
            </div>
            <!--人数制限-->
            <div class="form-group row">
                <label for="facility_numberlimit" 
                       class="col-md-5 col-form-label text-md-left">
                    人数制限
                    <span class="ml-1">任意</span>
                </label>
    
                <div class="col-md-5">
                   <input id="facility_numberlimit" 
                          type="text" 
                          class="form-control 
                                 @error('facility_numberlimit') is-invalid @enderror" 
                          name="facility_numberlimit" 
                          value="{{ old('facility_numberlimit') }}" 
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
            <!--駐車場あり/なし-->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">
                    駐車場
                    <span class="ml-1">任意</span>
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_parking" 
                           id="facility_parking4" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_parking') == '不明' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_parking4">
                        不明
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_parking" 
                           id="facility_parking1" 
                           value="施設内にあり"
                                 {{ old('facility_parking') == '施設内にあり' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_parking1">
                        施設内にあり
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_parking" 
                           id="facility_parking2" 
                           value="なし"
                                 {{ old('facility_parking') == 'なし' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_parking2">
                        なし
                    </label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_parking" 
                           id="facility_parking3"
                           value="施設外の近くにあり"
                                 {{ old('facility_parking') == '施設外の近くにあり' ? 'checked' : '' }}>
                    <label class="form-check-label" 
                           for="facility_parking3">
                        施設外の近くにあり
                    </label>
                </div>
                
            </div>
            
        </div>