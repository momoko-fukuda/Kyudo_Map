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
        パスワードの更新
    </strong>
</div>
<hr>


<div id="password_edit">
    <form method="post" action="{{route('mypage.update_password', $user->id)}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        
        
        <div class="form-group row">
            <label for="password" 
                   class="col-md-3 
                          col-form-label 
                          text-md-right">
                新しいパスワード
            </label>

            <div class="col-md-7">
                <input id="password" 
                       type="password" 
                       class="form-control 
                              @error('password') is-invalid @enderror" 
                              name="password" 
                              required 
                              autocomplete="new-password">

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
                   class="col-md-3 
                          col-form-label 
                          text-md-right">
                確認用
            </label>

            <div class="col-md-7">
                <input id="password-confirm" 
                       type="password" 
                       class="form-control" 
                       name="password_confirmation" 
                       required 
                       autocomplete="new-password">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger">
                パスワード更新
            </button>
        </div>
    </form>
</div>
@endsection