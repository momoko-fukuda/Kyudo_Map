@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mt-3 mb-3">新規登録</h3>

            <hr>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!--名前入力フォーム-->
                <div class="form-group row">
                    <label for="name" class="col-md-5 col-form-label text-md-left">アカウント名<span class="ml-1">必須</span></label>

                    <div class="col-md-7">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="弓太郎">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>アカウント名を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <!--メールアドレスフォーム-->
                <div class="form-group row">
                    <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス<span class="ml-1">必須</span></label>

                    <div class="col-md-7">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="kyudo@kyudo.com">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>メールアドレスを入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <!--活動エリア入力フォーム-->
                <div class="form-group row">
                    <label for="password" class="col-md-5 col-form-label text-md-left">活動エリア<span class="ml-1">必須</span></label>

                    <div class="col-md-7">
                        <!--areasテーブルのデータ$areasから都道府県id,nameを取ってきている-->
                        <select id="area_id" class="form-control @error('area_id') is-invalid @enderror" name="area_id" require autocomplete="address-level1">
                            <option value="" disabled selected style="display:none;">都道府県を選択してください</option>
                            @foreach($areas as $area)
                                <option value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach
                        </select>
                        
                        
                        @error('area_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>活動エリアを選択してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <!--パスワード入力フォーム-->
                <div class="form-group row">
                    <label for="password" class="col-md-5 col-form-label text-md-left">パスワード<span class="ml-1">必須</span></label>

                    <div class="col-md-7">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"placeholder="パスワードを設定してください">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-5 col-form-label text-md-left">パスワードの確認<span class="ml-1">必須</span></label>

                    <div class="col-md-7">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"placeholder="パスワードを再入力してください">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn w-100">
                        アカウント作成
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
