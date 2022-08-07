@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mt-3 
                       mb-3
                       text-center">
                新規登録
                <img src="../../images/register.png" 
                     alt="新規登録"
                     class="formimg">
            </h3>

            <hr>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!--名前入力フォーム-->
                <div class="form-group row">
                    <label for="name" 
                           class="col-md-5 
                                  col-form-label 
                                  text-md-left">
                        アカウント名
                        <span class="ml-1 required">必須</span>
                    </label>

                    <div class="col-md-7">
                        <input id="name" 
                               type="text" 
                               class="form-control
                                      @error('name') is-invalid @enderror" 
                               name="name" 
                               value="{{ old('name') }}" 
                               autocomplete="name" 
                               autofocus 
                               placeholder="弓太郎">

                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                        @endif
                    </div>
                </div>
                
                <!--メールアドレスフォーム-->
                <div class="form-group row">
                    <label for="email" 
                           class="col-md-5 
                                  col-form-label 
                                  text-md-left">
                        メールアドレス
                        <span class="ml-1 required">必須</span>
                    </label>

                    <div class="col-md-7">
                        <input id="email" 
                               type="email" 
                               class="form-control
                                      @error('email') is-invalid @enderror"
                               name="email" 
                               value="{{ old('email') }}" 
                               autocomplete="email" 
                               placeholder="kyudo@kyudo.com">

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
                
                <!--活動地域入力フォーム-->
                <div class="form-group row">
                    <label for="area_id" 
                           class="col-md-5 
                                  col-form-label 
                                  text-md-left">
                        活動地域
                        <span class="ml-1 required">必須</span>
                    </label>

                    <div class="col-md-7">
                        <!--areasテーブルのデータ$areasから都道府県id,nameを取ってきている-->
                        <select id="area_id" 
                                class="form-control
                                       @error('area_id') is-invalid @enderror" 
                                name="area_id" 
                                autocomplete="address-level1">
                            <option @if(old('area_id') == '') selected @endif
                                    disabled 
                                    selected 
                                    style="display:none;">
                                都道府県を選択してください
                            </option>
                            @foreach($areas as $area)
                                <option name="area_id" 
                                        value="{{$area->id}}"
                                        @if(old('area_id') == $area->id) selected @endif>
                                    {{$area->name}}
                                </option>
                            @endforeach
                        </select>
                        
                        
                        @if($errors->has('area_id'))
                            @foreach($errors->get('area_id') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                        @endif
                    </div>
                </div>
                
                <!--パスワード入力フォーム-->
                <div class="form-group row">
                    <label for="password" 
                           class="col-md-5 
                                  col-form-label 
                                  text-md-left">
                        パスワード
                        <span class="ml-1 required">必須</span>
                    </label>

                    <div class="col-md-7">
                        <input id="password" 
                               type="password" 
                               class="form-control
                                      @error('password') is-invalid @enderror" 
                               name="password" 
                               autocomplete="new-password"
                               placeholder="パスワードを設定してください">

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
                           class="col-md-5 
                                  col-form-label 
                                  text-md-left">
                        パスワードの確認
                        <span class="ml-1 required">必須</span>
                    </label>

                    <div class="col-md-7">
                        <input id="password-confirm" 
                               type="password" 
                               class="form-control" 
                               name="password_confirmation" 
                               autocomplete="new-password"
                               placeholder="パスワードを再入力してください">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="check_agree" 
                           class="col-md-5 
                                  col-form-label 
                                  text-md-left">
                        利用規約
                        <span class="ml-1 required">必須</span>
                    </label>
                    <div class="ml-5 pt-2">
                        <input type="checkbox" 
                               id="check_agree" 
                               class="form-check-input
                                      check_agree
                                      @error('check_agree') is-invalid @enderror" 
                               name="check_agree"
                               value="true">
                               同意する
                               <p>
                                   <a class="loginlink" 
                                      href="{{route('home.role')}}" 
                                      target="_blank">
                                       利用規約を確認する
                                   </a>
                               </p>
                               
                                @if($errors->has('check_agree'))
                                    @foreach($errors->get('check_agree') as $error)
                                        <small class="d-block 
                                                      text-danger ">
                                            {{$error}}
                                        </small>
                                    @endforeach
                                @endif
                    </div>
                    
                </div>

                <div class="form-group w-30 mx-auto my-5 text-center">
                    <button type="submit" id="button_submit" class="btn btn_check">
                        アカウント作成
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection