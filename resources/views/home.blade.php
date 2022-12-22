<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>トップ画面</title>
</head>
<body>
    <p>こんにちは！
    @if (Auth::check())
        {{ \Auth::user()->name }}さん</p>
        <a href="/logout">ログアウト</a>
    @else
        ゲストさん</p>
        <a href="/login">ログイン</a><br/>
        <a href="/register">会員登録</a>
    @endif
</body>
</html>
