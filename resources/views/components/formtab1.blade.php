<!--タブの内容１-->
    <div class="tab-content">
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

                   @error('address1')
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
                   <input id="use_money" type="text" class="form-control @error('use_money') is-invalid @enderror" name="use_money" value="{{ old('use_money') }}" autocomplete="off" autofocus placeholder="利用料金を入力してください（例：2時間500円）">

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