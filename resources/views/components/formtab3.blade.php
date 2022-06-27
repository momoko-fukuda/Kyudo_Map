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