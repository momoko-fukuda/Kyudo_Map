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
                       required
                       autofocus>
    
                     @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>20文字以内で、名前を入力してください</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <!--メールアドレス-->
        <div class="form-group">
            <label for="email" 
                   class="col-form-label text-md-left">
                ユーザー名
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
                       required
                       autofocus>
    
                     @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>メールアドレスを入力してください</strong>
                </span>
                @enderror
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
                        required 
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
                        
                @error('area_id')
                <span class="invalid-feedback" role="alert">
                    <strong>活動エリアを選択してください</strong>
                </span>
                @enderror
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
                

                @error('img')
                    <span class="invalid-feedback" role="alert">
                        <strong>選択した画像データは容量を超えています</strong>
                    </span>
                @enderror
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