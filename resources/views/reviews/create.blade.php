<!--★口コミ投稿-->


@extends('layouts.app')

@section('content')


<div>
    <div>
        <a href="{{ route('home') }}">Home</a>>
        <a href="{{ route('dojos.index') }}">弓道場検索</a>>
        <a href="{{ route('dojos.show', $dojo->id )}}"> {{$dojo->name}} </a>>
        <a href="{{ route('reviews.index', $dojo->id )}}">{{$dojo->name}}の口コミ一覧</a>>
        <strong class="now">口コミ投稿</strong>
    </div>
</div>


<div>
    <h1>{{$dojo->name}}の写真・口コミ投稿画面</h1>
    <h4>{{$dojo->name}}を利用したことのある場合、口コミを投稿して、<br>道場の雰囲気や注意事項などをみんなに共有しよう！</h4>
    <p>※登録後、弓道のTEBIKI管理者で登録された道場の内容を確認させていただきます。<br>
    内容を確認し、実在しない、または虚偽内容がある場合、削除する可能性がございます。</p>
</div>


<hr>
<div>
    <h4 class="mt-5">口コミ投稿フォーム</h4>
    
    <form id="form_reviewcreate" action="{{ route('reviews.store', $dojo->id )}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <!--ユーザーID（隠し）-->
        <input type="hidden" name="user_id" value="{{$user->id}}">
        
        <!--道場ID--> 
        <input type="hidden" name="dojo_id" value="{{$dojo->id}}">
        
        
        
        <!--タイトル-->
        <div class="form-group">
                <label for="title" 
                       class="col-md-5 col-form-label text-md-left">
                    題名
                    <span class="ml-1">必須</span>
                </label>

                <div class="col-md-5">
                   <input id="title" 
                          type="text" 
                          class="form-control 
                                 @error('title') is-invalid @enderror" 
                          name="title" 
                          value="{{ old('title') }}" 
                          required 
                          autocomplete="on" 
                          autofocus 
                          placeholder="{{$dojo->name}}の口コミ">

                   @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>入力必須項目です</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
        <!--コメント-->
        <div class="form-group">
                <label for="body" 
                       class="col-md-5 col-form-label text-md-left">
                    コメント
                    <span class="ml-1">必須</span>
                </label>
    
                <div class="col-md-5">
                   <textarea id="body" 
                             class="form-control 
                                    @error('body') is-invalid @enderror" 
                             name="body" 
                             value="{{ old('body') }}" 
                             autocomplete="on" 
                             autofocus 
                             placeholder="道場を利用した際の感想を記載してください">
                   </textarea>
    
                   @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>255文字以内で入力してください</strong>
                    </span>
                    @enderror
                </div>
            </div>
        
        
        <!--写真アップ-->
        <div class="form-group">
                <label class="col-md-5 
                              col-form-label 
                              text-md-left 
                              @error('img') is-invalid @enderror">
                    弓道場画像
                    <span class="ml-1">任意</span>
                </label>
                <div>
                    @if(empty(old('img')))
                    <div class="imgbox">
                        <input type="file" 
                               multiple
                               class="form-controle-file" 
                               name="img[]"
                               class="img">
                        <button type="button" class="append_imgs">+</button>
                        <button type="button" class="remove_imgs">-</button>
                    </div>
                    @else
                        @foreach(old('img') as $value)
                        <div class="imgbox">
                        <input type="file" 
                               multiple
                               class="form-controle-file img" 
                               name="img[]"
                               value="{{$value}}">
                        <button type="button" class="append_imgs">+</button>
                        <button type="button" class="remove_imgs">-</button>
                        @endforeach
                    @endif
                </div>
                

                @error('img')
                    <span class="invalid-feedback" role="alert">
                        <strong>選択した画像データは容量を超えています</strong>
                    </span>
                @enderror
            </div>
            
            
            <div class="form-group">
            <button type="submit" class="btn btn-primary w-50" id="btn_submit">
                口コミ投稿
            </button>
        </div>
        
    </form>
</div>




@endsection