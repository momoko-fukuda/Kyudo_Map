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
        退会申請
    </strong>
</div>
<hr>


<h3 class="text-center">退会申請</h3>


<div class="text-center">
    <form method="POST" 
          action="{{route('mypage.delete', $user->id)}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        
        <div class="deletemessage">いつも弓道場のTEBIKIをご利用頂きありがとうございます。
            <br>退会されますと、{{$user->name}}さんの情報が全て削除され、復旧できなくなります。
        </div>
        <img class="user_deleteimg" src="../../images/user_delete.png" alt="退会申請">
        
        <div class="btn-userdelete">  
            <a href="{{route('mypage')}}" type="button" class="btn btn-danger">キャンセル</a>
            <button type="submit" class="btn btn-secondary">退会する</button>
        </div>                          
    </form>
</div>
@endsection