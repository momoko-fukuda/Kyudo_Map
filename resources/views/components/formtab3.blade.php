<!--タブ内容3-->
        <div>
            <!--定休日-->
            <div class="fform-group row">
                <label class="col-md-4 col-form-label text-md-left">
                    定休日（複数選択可）
                    <span class="ml-1">任意</span>
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday_mon" 
                           id="holiday_mon" 
                           value="true"
                                  {{ old('holiday_mon') == 'true' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday_mon">月曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday_tues" 
                           id="holiday_tues" 
                           value="true"
                                  {{ old('holiday_tues') == 'true' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday_tues">火曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday_wednes" 
                           id="holiday_wednes" 
                           value="true"
                                  {{ old('holiday_wednes') == 'true' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday_wednes">水曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday_thurs" 
                           id="holiday_thurs" 
                           value="true"
                                  {{ old('holiday_thurs') == 'true' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday_thurs">木曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday_fri" 
                           id="holiday_fri" 
                           value="true"
                                  {{ old('holiday_fri') == 'true' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday_fri">金曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday_satur" 
                           id="holiday_satur" 
                           value="true"
                                  {{ old('holiday_satur') == 'true' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday_satur">土曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday_sun" 
                           id="holiday_sun" 
                           value="true"
                                  {{ old('holiday_sun') == 'true' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday_sun">日曜日</label>
                </div>
            </div>
            
            <!--営業時間-->
            <div class="form-group row" >
                <label for="from" 
                       class="col-md-4 
                              col-form-label 
                              text-md-left">
                    営業時間
                    <span class="ml-1">任意</span>
                </label>
                <div class="w-50" id="businesshours" >
                    <div>
                        <label>１開始時間</label>
                        <input type="time" class="from1" name="from1" value="{{old('from1')}}">
                        <label>終了時間</label>
                        <input type="time" class="to1" name="to1" value="{{old('to1')}}">
                    </div>
                    
                    
                    
                    <div class="hidehours">
                        <label>２開始時間</label>
                        <input type="time" class="from2" name="from2" value="{{old('from2')}}">
                        <label>終了時間</label>
                        <input type="time" class="to2" name="to2" value="{{old('to2')}}">
                    </div>
                    <div class="hidehours">
                        <label>３開始時間</label>
                        <input type="time" class="from3" name="from3" value="{{old('from3')}}">
                        <label>終了時間</label>
                        <input type="time" class="to3" name="to3" value="{{old('to3')}}">
                    </div>
                    <div class="hidehours">
                        <label>４開始時間</label>
                        <input type="time" class="from4" name="from4" value="{{old('from4')}}">
                        <label>終了時間</label>
                        <input type="time" class="to4" name="to4" value="{{old('to4')}}">
                    </div>
                    <div class="hidehours">
                        <label>５開始時間</label>
                        <input type="time" class="from5" name="from5" value="{{old('from5')}}">
                        <label>終了時間</label>
                        <input type="time" class="to5" name="to5" value="{{old('to5')}}">
                    </div>
                    
                    <button type="button" 
                            class="btn btn-primary fadehourbtn">
                        時間区分を分ける
                    </button>
                    
                </div>
            </div>
            
            
            
            <!--備考-->
            <div class="form-group row">
                <label for="other" 
                       class="col-md-5 col-form-label text-md-left">
                    備考
                    <span class="ml-1">任意</span>
                </label>
    
                <div class="col-md-5">
                   <textarea id="other" 
                             class="form-control 
                                    @error('other') is-invalid @enderror" 
                             name="other" 
                             value="{{ old('other') }}" 
                             autocomplete="on" 
                             autofocus 
                             placeholder="その他、利用する上での注意事項を記入してください">
                   </textarea>
    
                   @error('other')
                    <span class="invalid-feedback" role="alert">
                        <strong>255文字以内で入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
        </div>
        