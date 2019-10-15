<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>新規登録</title>
  <link rel="stylesheet" href="/css/shop.css">
</head>
<body>
  @if(isset($message))
    <div class="base">
      <p>
        {{ $message }}
      </p>
      <button class="btn" type="button" onclick="location.href='login.php'">ログイン</button>
    </div>
  @else
  <h1>新規登録</h1>
  <div class="base">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <p><span class="error">{{ $error }}</span></p>
      @endforeach
    @endif
    <form action="/auth/register" method="post">
      {{ csrf_field() }}
      <p>
        お名前：<br>
        <input type="text" name="name" value="{{ old('name') }}">
      </p>
      <p>
        ご住所：<br>
        <input type="text" name="address" value="{{ old('address') }}">
      </p>
      <p>
        電話番号<br>
        <input type="text" name="tel" value="{{ old('tel' )}}">
      </p>
      <p>
        メールアドレス：<br>
        <input type="text" name="email" value="{{ old('email') }}">
      </p>
      <p>
        パスワード：<br>
        <input type="password" name="password">
      </p>
      <p>
        パスワード(確認)：<br>
        <input type="password" name="password_confirmation">
      </p>
      <p>
        <input type="submit" value="新規登録">
      </p>
    </form>
  </div>
  @endif
  <div class="base">
    <a href="/">お買い物に戻る</a>
    <a href="cart.php">カートに戻る</a>
  </div>
</body>
</html>
