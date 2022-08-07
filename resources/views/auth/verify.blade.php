@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h3 class="mt-5">
                弓道場のTEBIKIに<br>ご登録ありがとうございます！
            </h3>
            <img src="../../images/dojosearch.gif" 
                 alt="thanks"
                 class="w-75 
                        m-auto">

            <p>
                現在、仮会員の状態です。
            </p>

            <p>
                ただいま、ご入力頂いたメールアドレス宛に、<br>ご本人様確認用のメールをお送りしました。
            </p>

            <p class="mb-5">
                メール本文内のURLをクリックすると本会員登録が<br>完了となります。
            </p>
        </div>
    </div>
</div>
@endsection
