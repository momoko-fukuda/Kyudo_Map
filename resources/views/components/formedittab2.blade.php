<div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
    <!--屋内/屋外-->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-left">
                    屋内/屋外
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_inout" 
                           id="facility_inout3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_inout', $dojo->facility_inout) == '不明' ? 'checked' : ''}}>
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
                                 {{ old('facility_inout', $dojo->facility_inout) == '屋内' ? 'checked' : ''}}>
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
                                 {{ old('facility_inout', $dojo->facility_inout) == '屋外' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="facility_inout2">
                        屋外
                    </label>
                </div>
                
                
            </div>
            <!--巻藁あり/なし-->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-left">
                    巻藁の設置
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_makiwara" 
                           id="facility_makiwara3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_makiwara', $dojo->facility_makiwara) == '不明' ? 'checked' : ''}}>
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
                                 {{ old('facility_makiwara', $dojo->facility_makiwara) == 'あり' ? 'checked' : ''}}>
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
                                 {{ old('facility_makiwara', $dojo->facility_makiwara) == 'なし' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="facility_makiwara2">
                        なし
                    </label>
                </div>
                
                
            </div>
            <!--冷暖房あり/なし-->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-left">
                    冷暖房設備
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_aircondition" 
                           id="facility_aircondition3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_aircondition', $dojo->facility_aircondition) == '不明' ? 'checked' : ''}}>
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
                                 {{ old('facility_aircondition', $dojo->facility_aircondition) == 'あり' ? 'checked' : ''}}>
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
                                 {{ old('facility_aircondition', $dojo->facility_aircondition) == 'なし' ? 'checked' : ''}}>
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
                </label>
    
                <div class="col-md-5">
                   <input id="facility_matonumber" 
                          type="text" 
                          class="form-control 
                                 @error('facility_matonumber') is-invalid @enderror" 
                          name="facility_matonumber" 
                          value="{{old('facility_matonumber') == '' ? $dojo->facility_matonumber : old('facility_matonumber')}}" 
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
                <label class="col-md-5 col-form-label text-md-left">
                    更衣室
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_lockerroom" 
                           id="facility_lockerroom3" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_lockerroom', $dojo->facility_lockerroom) == '不明' ? 'checked' : ''}}>
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
                                 {{ old('facility_lockerroom', $dojo->facility_lockerroom) == 'あり' ? 'checked' : ''}}>
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
                                 {{ old('facility_lockerroom', $dojo->facility_lockerroom) == 'なし' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="facility_lockerroom2">
                        なし
                    </label>
                </div>
                
                
            </div>
            
            <!--駐車場あり/なし-->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-left">
                    駐車場
                </label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="facility_parking" 
                           id="facility_parking4" 
                           checked = 'checked'
                           value="不明"
                                 {{ old('facility_parking', $dojo->facility_parking) == '不明' ? 'checked' : ''}}>
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
                                 {{ old('facility_parking', $dojo->facility_parking) == '施設内にあり' ? 'checked' : ''}}>
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
                                 {{ old('facility_parking', $dojo->facility_parking) == 'なし' ? 'checked' : ''}}>
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
                                 {{ old('facility_parking', $dojo->facility_parking) == '施設外の近くにあり' ? 'checked' : ''}}>
                    <label class="form-check-label" 
                           for="facility_parking3">
                        施設外の近くにあり
                    </label>
                </div>
                
            </div>
            <!--定休日★oldeヘルパー上手くいかない-->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-left">
                    定休日（複数選択可）
                </label>
                <div class="w-50">
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="holiday_mon" value="false">
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="holiday_mon" 
                               id="holiday_mon" 
                               value= "true"
                               @if($errors->any())
                                      {{ old('holiday_mon') == 'true' ? 'checked' : 'false' }}
                               @else
                                      {{ $dojo->holiday_mon == 'true' ? 'checked' : 'false' }}
                               @endif>
                        <label class="form-check-label" for="holiday_mon">月曜日</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="holiday_tues" value="false">
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="holiday_tues" 
                               id="holiday_tues" 
                               value="true"
                                      @if($errors->any())
                                        {{ old('holiday_tues') == 'true' ? 'checked' : '' }}
                                      @else
                                        {{ $dojo->holiday_tues == 'true' ? 'checked' : '' }}
                                      @endif>
                        <label class="form-check-label" for="holiday_tues">火曜日</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="holiday_wednes" value="false">
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="holiday_wednes" 
                               id="holiday_wednes" 
                               value="true"
                                      @if($errors->any())
                                        {{ old('holiday_wednes') == 'true' ? 'checked' : 'false' }}
                                      @else
                                        {{ $dojo->holiday_wednes == 'true' ? 'checked' : 'false' }}
                                      @endif>
                        <label class="form-check-label" for="holiday_wednes">水曜日</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="holiday_thurs" value="false">
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="holiday_thurs" 
                               id="holiday_thurs" 
                               value="true"
                                      @if($errors->any())
                                        {{ old('holiday_thurs') == 'true' ? 'checked' : '' }}
                                      @else
                                        {{ $dojo->holiday_thurs == 'true' ? 'checked' : '' }}
                                      @endif>
                        <label class="form-check-label" for="holiday_thurs">木曜日</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="holiday_fri" value="false">
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="holiday_fri" 
                               id="holiday_fri" 
                               value="true"
                                      @if($errors->any())
                                        {{ old('holiday_fri') == 'true' ? 'checked' : '' }}
                                      @else
                                        {{ $dojo->holiday_fri == 'true' ? 'checked' : '' }}
                                      @endif>
                        <label class="form-check-label" for="holiday_fri">金曜日</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="holiday_satur" value="false">
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="holiday_satur" 
                               id="holiday_satur" 
                               value="true"
                                      @if($errors->any())
                                        {{ old('holiday_satur') == 'true' ? 'checked' : '' }}
                                      @else
                                        {{ $dojo->holiday_satur == 'true' ? 'checked' : '' }}
                                      @endif>
                        <label class="form-check-label" for="holiday_satur">土曜日</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="holiday_sun" value="false">
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="holiday_sun" 
                               id="holiday_sun" 
                               value="true"
                                      @if($errors->any())
                                        {{ old('holiday_sun') == 'true' ? 'checked' : '' }}
                                      @else
                                        {{ $dojo->holiday_sun == 'true' ? 'checked' : '' }}
                                      @endif>
                        <label class="form-check-label" for="holiday_sun">日曜日</label>
                    </div>
                </div>
            </div>
            
            <!--営業時間-->
            <div class="form-group row" >
                <label for="from" 
                       class="col-md-5 col-form-label text-md-left">
                    営業時間
                </label>
                <div class="w-50" id="businesshours" >
                    @if(empty($businesshour))
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
                    
                    
                    @else
                    <div>
                        <label>１開始時間</label>
                        <input type="time" class="from1" name="from1" value="{{old('from1') == '' ? $businesshour->from1 : old('from1')}}">
                        <label>終了時間</label>
                        <input type="time" class="to1" name="to1" value="{{old('to1') == '' ? $businesshour->to1 : old('to1')}}">
                    </div>
                    
                    
                    
                    <div class="hidehours">
                        <label>２開始時間</label>
                        <input type="time" class="from2" name="from2" value="{{old('from2') == '' ? $businesshour->from2 : old('from2')}}">
                        <label>終了時間</label>
                        <input type="time" class="to2" name="to2" value="{{old('to2') == '' ? $businesshour->to2 : old('to2')}}">
                    </div>
                    <div class="hidehours">
                        <label>３開始時間</label>
                        <input type="time" class="from3" name="from3" value="{{old('from3') == '' ? $businesshour->from3 : old('from3')}}">
                        <label>終了時間</label>
                        <input type="time" class="to3" name="to3" value="{{old('to3') == '' ? $businesshour->to3 : old('to3')}}">
                    </div>
                    <div class="hidehours">
                        <label>４開始時間</label>
                        <input type="time" class="from4" name="from4" value="{{old('from4') == '' ? $businesshour->from4 : old('from4')}}">
                        <label>終了時間</label>
                        <input type="time" class="to4" name="to4" value="{{old('to4') == '' ? $businesshour->to4 : old('to4')}}">
                    </div>
                    <div class="hidehours">
                        <label>５開始時間</label>
                        <input type="time" class="from5" name="from5" value="{{old('from5') == '' ? $businesshour->from5 : old('from5')}}">
                        <label>終了時間</label>
                        <input type="time" class="to5" name="to5" value="{{old('to5') == '' ? $businesshour->to5 : old('to5')}}">
                    </div>
                    @endif
                    
                    <button type="button" 
                            class="btn btn_check fadehourbtn">
                        もっとみる
                    </button>
                   

                </div>
            </div>

            
            <!--備考-->
            <div class="form-group row">
                <label for="other" 
                       class="col-md-5 col-form-label text-md-left">
                    備考
                </label>
    
                <div class="col-md-5">
                   <textarea id="other" 
                             class="form-control 
                                    @error('other') is-invalid @enderror" 
                             name="other" 
                             value="{{old('other') == '' ? $dojo->other : old('other')}}" 
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