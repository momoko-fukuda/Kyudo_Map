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