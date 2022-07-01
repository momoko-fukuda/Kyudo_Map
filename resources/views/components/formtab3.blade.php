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
                           name="holiday[]" 
                           id="holiday1" 
                           value="月曜日"
                                  {{ old('holiday[]') == '月曜日' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday1">月曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday[]" 
                           id="holiday2" 
                           value="火曜日"
                                  {{ old('holiday[]') == '火曜日' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday2">火曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday[]" 
                           id="holiday3" 
                           value="水曜日"
                                  {{ old('holiday[]') == '水曜日' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday3">水曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday[]" 
                           id="holiday4" 
                           value="木曜日"
                                  {{ old('holiday[]') == '木曜日' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday4">木曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday[]" 
                           id="holiday5" 
                           value="金曜日"
                                  {{ old('holiday[]') == '金曜日' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday5">金曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday[]" 
                           id="holiday6" 
                           value="土曜日"
                                  {{ old('holiday[]') == '土曜日' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday6">土曜日</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="holiday[]" 
                           id="holiday7" 
                           value="日曜日"
                                  {{ old('holiday[]') == '日曜日' ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday7">日曜日</label>
                </div>
            </div>
            
            <!--営業時間-->
            <div class="form-group row">
                <label for="from" 
                       class="col-md-4 col-form-label text-md-left">
                    営業時間(区分1)
                    <span class="ml-1">任意</span>
                </label>
                <div>
                <label>開始時間</label>
                <input type="time" name="from[]" value="{{ old('from.0')}}">
                <label>終了時間</label>
                <input type="time" name="to[]" value="{{ old('to.0')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="from" 
                       class="col-md-4 col-form-label text-md-left">
                    営業時間(区分2)
                    <span class="ml-1">任意</span>
                </label>
                <div>
                <label>開始時間</label>
                <input type="time" name="from[]" value="{{ old('from.1')}}">
                <label>終了時間</label>
                <input type="time" name="to[]" value="{{ old('to.1')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="from" 
                       class="col-md-4 col-form-label text-md-left">
                    営業時間(区分3)
                    <span class="ml-1">任意</span>
                </label>
                <div>
                <label>開始時間</label>
                <input type="time" name="from[]" value="{{ old('from.2')}}">
                <label>終了時間</label>
                <input type="time" name="to[]" value="{{ old('to.2')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="from" 
                       class="col-md-4 col-form-label text-md-left">
                    営業時間(区分4)
                    <span class="ml-1">任意</span>
                </label>
                <div>
                <label>開始時間</label>
                <input type="time" name="from[]" value="{{ old('from.3')}}">
                <label>終了時間</label>
                <input type="time" name="to[]" value="{{ old('to.3')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="from" 
                       class="col-md-4 col-form-label text-md-left">
                    営業時間(区分5)
                    <span class="ml-1">任意</span>
                </label>
                <div>
                <label>開始時間</label>
                <input type="time" name="from[]" value="{{ old('from.4')}}">
                <label>終了時間</label>
                <input type="time" name="to[]" value="{{ old('to.4')}}">
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