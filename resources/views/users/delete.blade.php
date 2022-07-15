@extends('layouts.app')


@section('content')
<h1>退会申請</h1>


<div>
    <form method="POST" action="{{route('mypage.delete', $user->id)}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        
        <div>いつも弓道場のTEBIKIをご利用頂きありがとうございます。<br>退会されますと、{{$user->name}}さんの情報が全て削除され、復旧できなくなります。</div>
            
        <a href="/" type="button" class="btn btn-primary">キャンセル</a>
        <button type="submit" class="btn btn-secondary">退会する</button>
                                
    </form>
</div>
@endsection