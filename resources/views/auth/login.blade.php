@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mt-4 
                       mb-3
                       text-center">
                <img src="../../images/login.png" 
                     alt="login"
                     class="formimg">
                ログイン
                
            </h3>

            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!--email画面-->
                <div class="form-group">
                    <input id="email" 
                           type="email" 
                           class="col-md-9
                                  m-auto
                                  form-control 
                                  @error('email') is-invalid @enderror" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="email" 
                           autofocus 
                           placeholder="メールアドレス">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            メールアドレスが正しくない可能性があります。
                        </strong>
                    </span>
                    @enderror
                </div>
                
                <!--パスワード画面-->
                <div class="form-group">
                    <input id="password" 
                           type="password" 
                           class="col-md-9
                                  m-auto
                                  form-control 
                                  @error('password') is-invalid @enderror" 
                           name="password" 
                           required 
                           autocomplete="current-password" 
                           placeholder="パスワード">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            パスワードが正しくない可能性があります。
                        </strong>
                    </span>
                    @enderror
                </div>
                
                <!--自動ログインにするのチェック-->
                <div class="form-group">
                    <div class="form-check 
                                col-md-9
                                m-auto
                                pr-0">
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="remember" 
                               id="remember" 
                                   {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label 
                                      w-100" 
                               for="remember">
                            次回から自動的にログインする
                        </label>
                    </div>
                </div>
                
                <!--ログインボタンと注意書き-->
                <div class="form-group
                            text-center">
                    <button type="submit" 
                            class="mt-3 
                                   btn
                                   btn_check">
                        ログイン
                    </button>

                    <a class="loginlink
                              mt-3 
                              d-flex 
                              justify-content-center" 
                              href="{{ route('password.request') }}">
                        パスワードをお忘れの場合
                        <i class="fa-solid fa-face-anxious-sweat"></i>
                    </a>
                </div>
            </form>

            <hr>

            <div class="form-group">
                <a class="loginlink
                          mt-3 
                          d-flex 
                          justify-content-center" 
                          href="{{ route('register') }}">
                    
                    新規登録
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection