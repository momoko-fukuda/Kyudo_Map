@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mt-3 mb-3">ログイン</h3>

            <hr>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!--email画面-->
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>
                
                <!--パスワード画面-->
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>パスワードが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>
                
                <!--自動ログインにするのチェック-->
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label samazon-check-label w-100" for="remember">
                            次回から自動的にログインする
                        </label>
                    </div>
                </div>
                
                <!--ログインボタンと注意書き-->
                <div class="form-group">
                    <button type="submit" class="mt-3 btn samazon-submit-button w-100">
                        ログイン
                    </button>

                    <a class="btn btn-link mt-3 d-flex justify-content-center samazon-login-text" href="{{ route('password.request') }}">
                        パスワードをお忘れの場合
                    </a>
                </div>
            </form>

            <hr>

            <div class="form-group">
                <a class="btn btn-link mt-3 d-flex justify-content-center samazon-login-text" href="{{ route('register') }}">
                    新規登録
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection