<!--★ユーザー情報の編集画面-->


@extends('layouts.app')

@section('content')


<div class="route">
    <a href="{{route('home')}}">
        <i class="fa-solid fa-vihara"></i>
    </a>
    <i class="fa-solid fa-angles-right"></i>
    <a href="{{route('mypage')}}">
        <strong>{{$user->name}}さん</strong>のマイページ
    </a>
    <i class="fa-solid fa-angles-right"></i>
    <strong class="now">
        <i class="fa-solid fa-bullseye"></i>
        マイページ編集
    </strong>
</div>
<hr>


<div id="mypageedit">
    <h3>ユーザー情報の編集</h3>
    
    <form method="POST" 
          action="{{route('mypage.update', $user->id)}}" 
          enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        
        <!--ユーザー名-->
        <div class="form-group">
            <label for="name" 
                   class="col-form-label text-md-left">
                ユーザー名
                <span class="ml-1 required">必須</span>
            </label>
            <div>
                <input id="name" 
                       type="text" 
                       class="form-control 
                              @error('name') is-invalid @enderror" 
                       name="name" 
                       value="{{old('name') == '' ? $user->name : old('name')}}"  
                       autocomplete="name"
                       autofocus>
    
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
        
        <!--メールアドレス-->
        <div class="form-group">
            <label for="email" 
                   class="col-form-label text-md-left">
                メールアドレス
                <span class="ml-1 required">必須</span>
            </label>
    
            <div>
                <input id="email" 
                       type="text" 
                       class="form-control 
                              @error('email') is-invalid @enderror" 
                       name="email" 
                       value="{{old('email') == '' ? $user->email : old('email')}}"  
                       autocomplete="email"
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
        
        <!--登録エリア-->
        <div class="form-group">
            <label for="area_id" 
                   class="col-form-label text-md-left">
                活動エリア
                <span class="ml-1 required">必須</span>
            </label>

            <div>
                <select id="area_id" 
                        class="form-control 
                              @error('area_id') is-invalid @enderror" 
                        name="area_id"
                        autofocus>
                    <option disabled 
                            selected 
                            style="display:none;">
                        都道府県を選択してください
                    </option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" 
                            @if( $area->id == old('area_id',$user->area_id)) selected @endif>
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
        
        
        <!--画像登録-->
        <div class="form-group">
                <label class="col-form-label 
                              text-md-left 
                              @error('img') is-invalid @enderror">
                    ユーザー画像
                </label>
                <div>
                    <div class="imgbox">
                        <input type="file" 
                               class="form-controle-file img" 
                               name="img"
                               value="{{old('img') == '' ? $user->img : old('img')}}">
                    </div>
                </div>
                

                    @if($errors->has('img'))
                        @foreach($errors->get('img') as $error)
                            <small class="d-block 
                                          text-danger ">
                                {{$error}}
                            </small>
                        @endforeach
                    @endif
        </div>
        
        <!--ボタン-->
        <div class="text-center">
            <button type="submit" class="btn btn_check" id="btn_submit">
                変更を登録
            </button>
        </div>
        
    </form>
</div>

@endsection