@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div>
                <h3 class="mt-5">パスワードの再登録</h3>
                <hr>

                <div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" 
                               name="token" 
                               value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" 
                                   class="col-md-4 
                                          col-form-label 
                                          text-md-right">
                                メールアドレス
                            </label>

                            <div class="col-md-7">
                                <input id="email" 
                                       type="email" 
                                       class="
                                              form-control 
                                              @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ $email ?? old('email') }}"
                                       autocomplete="email" 
                                       placeholder="登録したメールアドレス"
                                       autofocus>

                                @if($errors->has('email'))
                                    @foreach($errors->get('email') as $error)
                                        <small class="d-block 
                                                      text-danger ">
                                            {{$error}}
                                        </small>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" 
                                   class="col-md-4 
                                          col-form-label 
                                          text-md-right">
                                新しいパスワード
                            </label>

                            <div class="col-md-7">
                                <input id="password" 
                                       type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password"
                                       autocomplete="new-password"
                                       placeholder="新しく設定するパスワード"
                                       autofocus>

                                @if($errors->has('password'))
                                    @foreach($errors->get('password') as $error)
                                        <small class="d-block 
                                                      text-danger ">
                                            {{$error}}
                                        </small>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" 
                                   class="col-md-4 
                                          col-form-label 
                                          text-md-right">
                                パスワードの確認
                            </label>

                            <div class="col-md-7">
                                <input id="password-confirm" 
                                       type="password" 
                                       class="form-control" 
                                       name="password_confirmation"
                                       autocomplete="new-password"
                                       placeholder="パスワードの確認"
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6 
                                        offset-md-4 
                                        mx-auto">
                                <button type="submit" class="btn btn_check">
                                    再登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
