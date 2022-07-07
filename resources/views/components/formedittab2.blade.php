<div>
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
                    <span class="ml-1">任意</span>
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
                <label class="col-md-4 col-form-label text-md-left">
                    定休日（複数選択可）
                    <span class="ml-1">任意</span>
                </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday_mon" 
                           id="holiday_mon" 
                           value= @if()
                           @if($errors->any())
                                  {{ old('holiday_mon') == 'true' ? 'checked' : 'false' }}
                           @else
                                  {{ $dojo->holiday_mon == 'true' ? 'checked' : 'false' }}
                           @endif>
                    <label class="form-check-label" for="holiday_mon">月曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
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
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday_wednes" 
                           id="holiday_wednes" 
                           value="ture"
                                  @if($errors->any())
                                    {{ old('holiday_wednes') == 'true' ? 'checked' : 'false' }}
                                  @else
                                    {{ $dojo->holiday_wednes == 'true' ? 'checked' : 'false' }}
                                  @endif>
                    <label class="form-check-label" for="holiday_wednes">水曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
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
            
            <!--営業時間-->
            <div class="form-group row" >
                <label for="from" 
                       class="col-md-4 col-form-label text-md-left">
                    営業時間
                    <span class="ml-1">任意</span>
                </label>
                <div class="w-50" id="businesshours" >
                    
                    @if($errors->any())
                        @foreach(old('from') as $key => $value)
                            <div class="hourbox">
                                <label>開始時間</label>
                                <input type="time" class="from" name="from[]" value="{{old('from.'.$key)}}">
                                <label>終了時間</label>
                                <input type="time" class="to" name="to[]" value="{{old('to.'.$key)}}">
                                <button type="button" class="append_businesshours">＋</button>
                                <button type="button" class="remove_businesshours">－</button>
                            </div>
                        @endforeach
                    
                    @elseif($businesshours->isEmpty())
                        <div class="hourbox">
                            <label>開始時間</label>
                            <input type="time" class="from" name="from[]">
                            <label>終了時間</label>
                            <input type="time" class="to" name="to[]">
                            <button type="button" class="append_businesshours">＋</button>
                            <button type="button" class="remove_businesshours">－</button>
                        </div>
                    
                    @elseif($businesshours->isNotEmpty())
                        @foreach($businesshours as $businesshour)
                                <div class="hourbox">
                                    <label>開始時間</label>
                                    <input type="time" class="from" name="from[]" value="{{$businesshour->from}}">
                                    <label>終了時間</label>
                                    <input type="time" class="to" name="to[]" value="{{$businesshour->to}}">
                                    <button type="button" class="append_businesshours">＋</button>
                                    <button type="button" class="remove_businesshours">－</button>
                                </div>
                        @endforeach
                    @endif

                </div>
            </div>
            
            <input type="hidden" name="business_hours" id="json_businesshour">
            
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