<!--★トップ画面-->
@extends('layouts.app')


@section('content')
<a href="{{route('home.about')}}">弓道MAPとは</a><br>

<br>
<a href="{{route('dojos.index')}}">道場検索</a>
@endsection