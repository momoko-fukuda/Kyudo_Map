<!--グループ２-->
        <div class="tab-pane fade" 
             id="item2" 
             role="tabpanel" 
             aria-labelledby="item2-tab">
            
             <!--年齢制限-->
            <div class="form-group row">
                <label for="use_age" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    年齢制限
                </label>
    
                <div class="col-md-7 flex-grow-1">
                   <input id="use_age" 
                          type="text" 
                          class="form-control
                                 @error('use_age') is-invalid @enderror" 
                          name="use_age" 
                          value="{{ old('use_age') }}" 
                          autocomplete="off" 
                          autofocus 
                          placeholder="例：10（※10歳以上の場合）">
    
                   @if($errors->has('use_age'))
                            @foreach($errors->get('use_age') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                    @endif
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

                <div class="col-md-7 flex-grow-1">
                    <select id="use_step" 
                            class="form-control
                                   @error('use_step') is-invalid @enderror" 
                            name="use_step" 
                            autofocus>
                        <option disabled 
                                selected 
                                style="display:none;">
                            段数を選択してください
                        </option>
                        <option value="無指定"
                                      {{ '無指定' == old('use_step') ? 'selected' : '' }}>
                            無指定
                        </option>
                        <option value="初段" 
                                      {{ '初段' == old('use_step') ? 'selected' : '' }}>
                            初段
                        </option>
                        <option value="弐段" 
                                      {{ '弐段' == old('use_step') ? 'selected' : '' }}>
                            弐段
                        </option>
                        <option value="参段" 
                                       {{ '参段' == old('use_step') ? 'selected' : '' }}>
                            参段
                        </option>
                        <option value="四段" 
                                      {{ '四段' == old('use_step') ? 'selected' : '' }}>
                            四段
                        </option>
                        <option value="五段" 
                                      {{ '五段' == old('use_step') ? 'selected' : '' }}>
                            五段
                        </option>
                        <option value="六段" 
                                      {{ '六段' == old('use_step') ? 'selected' : '' }}>
                            六段
                        </option>
                        <option value="七段" 
                                      {{ '七段' == old('use_step') ? 'selected' : '' }}>
                            七段
                        </option>
                        <option value="八段" 
                                      {{ '八段' == old('use_step') ? 'selected' : '' }}>
                            八段
                        </option>
                           
                    </select>
                </div>
            </div>
            
            <!--人数制限-->
            <div class="form-group row">
                <label for="facility_numberlimit" 
                       class="col-md-5 
                              col-form-label 
                              text-md-left">
                    人数制限
                </label>
    
                <div class="col-md-7 flex-grow-1">
                   <input id="facility_numberlimit" 
                          type="text" 
                          class="form-control
                                 @error('facility_numberlimit') is-invalid @enderror" 
                          name="facility_numberlimit" 
                          value="{{ old('facility_numberlimit') }}" 
                          autocomplete="off" 
                          autofocus 
                          placeholder="人数制限の詳細を記載">
    
                   @if($errors->has('facility_numberlimit'))
                            @foreach($errors->get('facility_numberlimit') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                    @endif
                </div>
            </div>
            
            <!--個人利用可否-->
            <div class="form-group row">
                <label class="col-md-5 
                              col-form-label 
                              text-md-left">
                    個人利用
                </label>
                
                <div class="form-check 
                           form-check-inline">
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
            
        </div>