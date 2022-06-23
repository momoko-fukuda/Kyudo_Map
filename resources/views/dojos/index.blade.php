★道場検索・一覧画面

<!--route('dojos.show', dojo()->id)で道場詳細ページ-->


<form method="GET" action="{{ route('dojos.index') }}">
    @csrf
    <div class="form-group row">
        <label for="password" class="col-md-5 col-form-label text-md-left">都道府県</label>

            <div class="col-md-7">
                <!--areasテーブルのデータ$areasから都道府県id,nameを取ってきている-->
                <select id="area_id" class="form-control @error('area_id') is-invalid @enderror" name="area_id" require autocomplete="address-level1">
                    <option value="" disabled selected style="display:none;">都道府県を選択してください</option>
                    @foreach($dojos as $dojo)
                        <option value="{{$area_id = $dojo->area_id}}">{{$dojo->area_name}}</option>
                    @endforeach
                </select>
            </div>
                    
    </div>
    <button class="btn btn-primary" onclick="clicksearch()">検索</button>
</form>
    