<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>title</title>
</head>
<body>
    <p>{{$data['name']}}様</p>
    <br><br>
    <p>お問合せありがとうございます。</p>
    <p>以下の内容でお問い合わせを受け付けました。</p>
    <p>お問合せ内容を確認し、場合によっては登録のメールアドレスへ返信させていただきます。</p>
    <br><br>
    <p>お問合せ種類：{{$data['contacttype']}}</p>
    <p>お名前：{{$data['name']}}</p>
    <p>メールアドレス：{{$data['email']}}</p>
    <p>お問い合わせ内容：</p>
    <p>{!!nl2br(htmlspecialchars($data['contact']))!!}</p>
    <p>個人情報の取り扱い：{{$data['check_agree']}}</p>
    <br><br>
    <p>弓道場のTEBIKI</p>
</body>
</html>