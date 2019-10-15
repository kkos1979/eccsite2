<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>購入 | Noodle Shop</title>
  <link rel="stylesheet" href="/css/shop.css">
</head>
<body>
  <h1>購入</h1>
  <div class="base">
    <p>商品のご送付先を入力してください。</p>
    @if (!Auth::check())
      <p>ログインしていただくとご登録いただいている情報が入力されます。</p>
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p><span class="error">{{ $error }}</span></p>
    @endforeach
    @endif
    <form action="/cart/buy" method="post">
      @csrf
      <p>
        お名前：<br>
        <input type="text" name="name" value="{{ old('name') ?? \Auth::user()->name ?? '' }}">
      </p>
      <p>
        ご住所：<br>
        <input type="text" name="address" size="60" value="{{ old('address') ?? \Auth::user()->address ?? ''}}">
      </p>
      <p>
        電話番号：<br>
        <input type="text" name="tel" value="{{ old('tel') ?? \Auth::user()->tel ?? ''}}">
      </p>
      <p>
        <input type="submit" value="購入">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="/">お買い物に戻る</a>
    <a href="/cart">カートに戻る</a>
    @if (!Auth::check())
      <button class="btn" type="button" onclick="location.href='/auth/login'">ログイン</button>
    @endif
  </div>
</body>
</script>
</html>
