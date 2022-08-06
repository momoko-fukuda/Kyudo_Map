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

    <h4 class="reviewformtitle">口コミ投稿フォーム</h4>
    
    <form id="form_reviewcreate" 
          action="{{ route('reviews.store', $dojo->id )}}" 
          method="POST" 
          enctype="multipart/form-data">
        {{ csrf_field() }}
        
        
        <div id="reviewform">
            <!--ユーザーID（隠し）-->
            <input type="hidden" name="user_id" value="{{$user->id}}">
            
            <!--道場ID（隠し）--> 
            <input type="hidden" name="dojo_id" value="{{$dojo->id}}">
            
            
            
            <!--タイトル-->
            <div class="form-group">
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
                              autocomplete="on" 
                              autofocus 
                              placeholder="{{$dojo->name}}の口コミ">
    
                       @if($errors->has('title'))
                            @foreach($errors->get('title') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                        @endif
                    </div>
            </div>
                
            <!--コメント-->
            <div class="form-group">
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
                                 autocomplete="on" 
                                 autofocus 
                                 placeholder="道場を利用した際の感想を記載してください">{{ old('body') }}</textarea>
        
                       @if($errors->has('body'))
                            @foreach($errors->get('body') as $error)
                                <small class="d-block 
                                              text-danger ">
                                    {{$error}}
                                </small>
                            @endforeach
                        @endif
                    </div>
            </div>
            
            
            <!--写真アップ-->
            <div class="form-group">
                    <label class="col-md-5 
                                  col-form-label 
                                  text-md-left 
                                  @error('img') is-invalid @enderror">
                        弓道場画像<small>(約5枚~10枚まで可※容量10MB)</small>
                    </label>
                    <div>
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
                    </div>
                    
    
                    @foreach($errors->get('img.*') as $messages)
                        @foreach($messages as $message)
                            <small class="d-block 
                                          text-danger ">
                                {{$message}}
                            </small>
                        @endforeach
                    @endforeach
            </div>
        </div>        
                
        <div class="btn_submit form-group">
            <button type="submit" class="btn btn_check" id="btn_submit">
                口コミを投稿する
            </button>
        </div>
        
    </form>

@endsection