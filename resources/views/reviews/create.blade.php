<!--★口コミ投稿-->


@extends('layouts.app')

@section('content')



<div class="route">
    <a href="{{ route('home') }}">
        <i class="fa-solid fa-vihara"></i>
    </a>
    <i class="fa-solid fa-angles-right"></i>
    <a href="{{ route('dojos.index') }}">弓道場検索</a>
    <i class="fa-solid fa-angles-right"></i>
    <a href="{{ route('dojos.show', $dojo->id )}}"> {{$dojo->name}} </a>
    <i class="fa-solid fa-angles-right"></i>
    <a href="{{ route('reviews.index', $dojo->id )}}">{{$dojo->name}}の口コミ一覧</a>
    <i class="fa-solid fa-angles-right"></i>
    <strong class="now">
        <i class="fa-solid fa-bullseye"></i>
        写真・口コミ投稿
    </strong>
</div>
<hr>

<div class="reviewcreatetop">
    <h1>{{$dojo->name}}の<br>写真・口コミ投稿</h1>
    <p>
        {{$dojo->name}}を利用したことのある場合、口コミを投稿して、
        <br>道場の雰囲気や注意事項などをみんなに共有しよう！
    </p>
</div>


<hr>

    <h4 class="mt-5 reviewformtitle">口コミ投稿フォーム</h4>
    
    <form id="form_reviewcreate" action="{{ route('reviews.store', $dojo->id )}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        
        <div id="reviewform">
            <!--ユーザーID（隠し）-->
            <input type="hidden" name="user_id" value="{{$user->id}}">
            
            <!--道場ID--> 
            <input type="hidden" name="dojo_id" value="{{$dojo->id}}">
            
            
            
            <!--タイトル-->
            <div class="form-group row">
                    <label for="title" 
                           class="col-md-5 col-form-label text-md-left">
                        題名
                        <span class="ml-1 required">必須</span>
                    </label>
    
                    <div class="col-md-12">
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
            <div class="form-group row">
                    <label for="body" 
                           class="col-md-5 col-form-label text-md-left">
                        コメント
                        <span class="ml-1 required">必須</span>
                    </label>
        
                    <div class="col-md-12">
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
            <div class="form-group row">
                    <label class="col-md-5 
                                  col-form-label 
                                  text-md-left 
                                  @error('img') is-invalid @enderror">
                        弓道場画像
                    </label>
                    <div>
                        @if(empty(old('img')))
                        <div class="imgbox col-md-12">
                            <input type="file" 
                                   multiple
                                   class="form-controle-file" 
                                   name="img[]"
                                   class="img">
                            <a type="button" class="append_imgs">
                                <i class="fa-solid fa-circle-plus"></i>
                            </a>
                            <a type="button" class="remove_imgs">
                                <i class="fa-solid fa-circle-minus"></i>
                            </a>
                        </div>
                        @else
                            @foreach(old('img') as $value)
                            <div class="imgbox col-md-7">
                                <input type="file" 
                                       multiple
                                       class="form-controle-file img" 
                                       name="img[]"
                                       value="{{$value}}">
                                <a type="button" class="append_imgs">
                                    <i class="fa-solid fa-circle-plus"></i>
                                </a>
                                <a type="button" class="remove_imgs">
                                    <i class="fa-solid fa-circle-minus"></i>
                                </a>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    
    
                    @error('img')
                        <span class="invalid-feedback" role="alert">
                            <strong>選択した画像データは容量を超えています</strong>
                        </span>
                    @enderror
            </div>
        </div>        
                
        <div class="btn_submit form-group">
            <button type="submit" class="btn btn_check" id="btn_submit">
                口コミを投稿する
            </button>
        </div>
        
    </form>

@endsection