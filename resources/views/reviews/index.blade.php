<!--★口コミ詳細画面-->


@extends('layouts.app')

@section('content')

<h1>口コミ一覧画面</h1>
<a type=button class="btn btn-primary" href="{{route('reviews.create', $dojo->id)}}">口コミ投稿する</a>

@endsection