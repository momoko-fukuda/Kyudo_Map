@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mt-3 mb-3 text-center">パスワード再設定</h3>
            <hr>
            
            <p>
                ご登録時のメールアドレスを入力してください。<br>
                パスワード再発行用のメールをお送りします。
            </p>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                パスワードをリセットするURLを<br>登録されたメールアドレスへ送信しました。
            </div>
            @endif


            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn_check">
                        送信
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection