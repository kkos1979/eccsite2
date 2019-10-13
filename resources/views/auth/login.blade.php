<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ログイン</title>
  <link rel="stylesheet" href="/css/shop.css">
</head>
<body>
  <h1>ログイン</h1>
  <div class="base">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <p><span class="error">{{ $error }}</span></p>
      @endforeach
    @endif
    <form action="/auth/login" method="post">
      {{ csrf_field() }}
      <p>
        メールアドレス：<br>
        <input type="text" name="email" value="{{ old('email') }}">
      </p>
      <p>
        パスワード：<br>
        <input type="password" name="password">
      </p>
      <p>
        <input type="submit" value="ログイン">
        <button class="btn" type="button" onclick="location.href='/auth/register'">新規登録</button>
      </p>
    </form>
  </div>
  <div class="base">
    <a href="/">お買い物に戻る</a>
    <a href="cart.php">カートに戻る</a>
  </div>
</body>
</html>
