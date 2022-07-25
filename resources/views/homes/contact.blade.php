<!--お問合せフォーム-->

@extends('layouts.app')

@section('content')

<div class="route">
    <a href="{{ route('home') }}">
        <i class="fa-solid fa-vihara"></i>
    </a>
    <i class="fa-solid fa-angles-right"></i>
    <strong class="now">
        <i class="fa-solid fa-bullseye"></i>
        お問合せフォーム
    </strong>
</div>
<hr>


<h4 class="mt-5 reviewformtitle">お問い合わせフォーム</h4>

    
<form id="form_reviewcreate" action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
        
        
    <div id="reviewform">
        <!--お問合せ種類-->
        <div class="form-group row">
            <label for="requesttype" 
                   class="col-md-5 
                          col-form-label 
                          text-md-left">
                お問合せの種類
                <span class="ml-1 required">必須</span>
            </label>
            <div class="col-md-6">
                <select id="requesttype" 
                        class="form-control" 
                        name="requesttype" 
                        autofocus>
                    <option disabled 
                            selected 
                            style="display:none;">
                        お問合せ種類を選択
                    </option>
                    <option value="登録した弓道場に関して"
                                {{ '登録した弓道場に関して' == old('requesttype') ? 'selected' : '' }}>
                        登録した弓道場に関して
                    </option>
                    <option value="投稿されている口コミに関して" 
                                  {{ '投稿されている口コミに関して' == old('requesttype') ? 'selected' : '' }}>
                        投稿されている口コミに関して
                    </option>
                    <option value="本アプリに関する質問・要望" 
                                  {{ '本アプリに関する質問・要望' == old('requesttype') ? 'selected' : '' }}>
                        本アプリに関する質問・要望
                    </option>
                    <option value="その他" 
                                   {{ 'その他' == old('requesttype') ? 'selected' : '' }}>
                        その他
                    </option>
                </select>
            </div>
        </div>

            <!--名前-->
            <div class="form-group row">
                    <label for="name" 
                           class="col-md-5 
                                  col-form-label 
                                  text-md-left">
                        お名前
                        <span class="ml-1 required">必須</span>
                    </label>
    
                    <div class="col-md-6">
                       <input id="name" 
                              type="text" 
                              class="form-control 
                                     @error('name') is-invalid @enderror" 
                              name="name" 
                              value="{{ old('name') }}" 
                              required 
                              autocomplete="on" 
                              autofocus 
                              placeholder="お名前を記入してください">
    
                       @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>入力必須項目です</strong>
                        </span>
                        @enderror
                    </div>
            </div>
            <div class="form-group row">
                    <label for="e-mail" 
                           class="col-md-5 
                                  col-form-label 
                                  text-md-left">
                        メールアドレス
                        <span class="ml-1 required">必須</span>
                    </label>
    
                    <div class="col-md-6">
                       <input id="email" 
                              type="text" 
                              class="form-control 
                                     @error('email') is-invalid @enderror" 
                              name="email" 
                              value="{{ old('email') }}" 
                              required 
                              autocomplete="email" 
                              autofocus 
                              placeholder="連絡先を入力してください">
    
                       @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>入力必須項目です</strong>
                        </span>
                        @enderror
                    </div>
            </div>
            <!--タイトル-->
            <div class="form-group row">
                    <label for="title" 
                           class="col-md-5 
                                  col-form-label 
                                  text-md-left">
                        題名
                        <span class="ml-1 required">必須</span>
                    </label>
    
                    <div class="col-md-6">
                       <input id="title" 
                              type="text" 
                              class="form-control 
                                     @error('title') is-invalid @enderror" 
                              name="title" 
                              value="{{ old('title') }}" 
                              required 
                              autocomplete="on" 
                              autofocus 
                              placeholder="問い合わせタイトル">
    
                       @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>入力必須項目です</strong>
                        </span>
                        @enderror
                    </div>
            </div>
                
            <!--コメント-->
            <div class="form-group row">
                    <label for="body" 
                           class="col-md-5 col-form-label text-md-left">
                        お問合せ内容
                        <span class="ml-1 required">必須</span>
                    </label>
        
                    <div class="col-md-11">
                       <textarea id="body" 
                                 class="form-control 
                                        @error('body') is-invalid @enderror" 
                                 name="body" 
                                 value="{{ old('body') }}" 
                                 autocomplete="on" 
                                 autofocus 
                                 placeholder="お問合せ内容を入力してください">
                       </textarea>
        
                       @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>255文字以内で入力してください</strong>
                        </span>
                        @enderror
                    </div>
            </div>
            
            <div class="form-group row">
                    <label for="check_agree" class="col-md-5 col-form-label text-md-left">
                        個人情報の取り扱い
                        <span class="ml-1 required">必須</span>
                    </label>
                    <div class="ml-5 pt-2">
                        <input type="checkbox" 
                               id="check_agree" 
                               class="form-check-input
                                      check_agree" 
                               name="check_agree"
                               value="true"
                               required>
                               同意する
                               <p><a class="loginlink" href="{{route('home.role')}}" target="_blank">プライバシーポリシーを確認する</a></p>
                               
                                @error('check_agree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>お問合せいただく上で、個人情報の取り扱いへの同意は必須となります。</strong>
                                    </span>
                                @enderror
                    </div>
                    
                </div>
            
        </div>        
                
        <div class="btn_submit form-group">
            <button type="submit" class="btn btn_check" id="btn_submit">
                お問い合わせ
            </button>
        </div>
        
    </form>

@endsection