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

<!--メッセージ-->
@if(session('success'))
    <div class="alert 
                alert-success 
                alert-dismissible fade show
                w-50
                mx-auto">
        {{ session('success') }}
        <button type="button" 
                class="close" 
                data-dismiss="alert" 
                aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif


<h4 class="mt-5 reviewformtitle">お問い合わせフォーム</h4>
<div class="m-auto text-center w-75">
<p>いつも弓道場のTEBIKIをご利用くださり、ありがとうございます。<br>何かお気づきの点などございましたら、お問合せください。</p>
<p>お問合せ内容につきましては全て拝見させていただきますが、<br>全てに返信・対応が出来かねますこと、ご了承ください。</p>
</div>
    
<form id="form_reviewcreate" 
      action="{{route('home.contact_send')}}" 
      method="POST" 
      class="pb-5">
    {{ csrf_field() }}
        
        
    <div id="reviewform" class="mb-0">
        
        <!--お問合せ種類-->
        <div class="form-group row my-3">
            <label for="contacttype" 
                   class="col-md-5 
                          col-form-label 
                          text-md-left">
                お問合せの種類
                <span class="ml-1 required">必須</span>
            </label>
            <div class="col-md-7">
                <select id="contacttype" 
                        class="form-control" 
                        name="contacttype" 
                        autofocus>
                    <option disabled 
                            selected 
                            style="display:none;">
                        お問合せ種類を選択
                    </option>
                    <option value="登録した弓道場に関して"
                                {{ '登録した弓道場に関して' == old('contacttype') ? 'selected' : '' }}>
                        登録した弓道場に関して
                    </option>
                    <option value="投稿されている口コミに関して" 
                                  {{ '投稿されている口コミに関して' == old('contacttype') ? 'selected' : '' }}>
                        投稿されている口コミに関して
                    </option>
                    <option value="本アプリに関する質問・要望" 
                                  {{ '本アプリに関する質問・要望' == old('contacttype') ? 'selected' : '' }}>
                        本アプリに関する質問・要望
                    </option>
                    <option value="その他" 
                                   {{ 'その他' == old('contacttype') ? 'selected' : '' }}>
                        その他
                    </option>
                </select>
            </div>
        </div>

        <!--名前-->
        <div class="form-group row my-3">
            <label for="name" 
                   class="col-md-5 
                          col-form-label 
                          text-md-left">
                お名前
                <span class="ml-1 required">必須</span>
            </label>
            <div class="col-md-7">
                <input id="name" 
                       type="text" 
                       class="form-control 
                              @error('name') is-invalid @enderror" 
                       name="name" 
                       value="{{ old('name') }}" 
                       required 
                       autocomplete="name" 
                       autofocus 
                       placeholder="お名前を記入してください">
    
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>入力必須項目です</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <!--メールアドレス-->
        <div class="form-group row my-3">
            <label for="email" 
                   class="col-md-5 
                          col-form-label 
                          text-md-left">
                メールアドレス
                <span class="ml-1 required">必須</span>
            </label>
            <div class="col-md-7">
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
                    <strong>
                        入力必須項目であり、正しいメールアドレスを入力してください
                    </strong>
                </span>
            @enderror
            </div>
        </div>
                
        <!--コメント-->
        <div class="form-group row my-3">
            <label for="contact" 
                   class="col-md-5 col-form-label text-md-left">
                    お問合せ内容
                    <span class="ml-1 required">必須</span>
            </label>
            <div class="col-md-12">
               <textarea id="contact" 
                     class="form-control 
                            @error('contact') is-invalid @enderror" 
                     name="contact" 
                     autocomplete="on" 
                     autofocus 
                     placeholder="お問合せ内容を入力してください">{{ old('contact') }}</textarea>
        
               @error('contact')
                    <span class="invalid-feedback" role="alert">
                        <strong>255文字以内で入力してください</strong>
                    </span>
               @enderror
            </div>
        </div>
        
        <!--個人情報の取り扱い-->
        <div class="form-group row my-3">
            <label for="check_agree" 
                   class="col-md-6 
                          col-form-label 
                          text-md-left">
                個人情報の取り扱い
                <span class="ml-1 required">必須</span>
            </label>
            <div class="ml-5 pt-2">
                <input type="checkbox" 
                       id="check_agree" 
                       class="form-check-input
                              check_agree" 
                       name="check_agree"
                       value="同意する"
                       required>
                    同意する
                <p>
                    <a class="loginlink" 
                       href="{{route('home.policy')}}" 
                       target="_blank">
                        プライバシーポリシーを確認する
                    </a>
                </p>
                               
                @error('check_agree')
                    <span class="invalid-feedback" role="alert">
                        <strong>お問合せいただく上で、個人情報の取り扱いへの同意は必須となります。</strong>
                    </span>
                @enderror
            </div>
        </div>
                
        <div class="btn_submit form-group">
            <button type="submit" 
                    class="btn btn_check" 
                    id="btn_submit">
                お問い合わせ送信
            </button>
            <p>
                <small>※送信完了までに20秒程かかります</small>
            </p>
        </div>
    </form>

@endsection