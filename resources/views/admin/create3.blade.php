<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>商品追加</title>
  <link rel="stylesheet" href="/css/shop.css">
</head>
<body>
  <h1>商品追加</h1>
  @if ($errors->any())
    <div class="base">
      @foreach ($errors->all() as $error)
        <span class="error">{{ $error }}</span><br>
      @endforeach
    </div>
  @endif
  <div class="base">
    <form action="/create" method="post">
      @csrf
      <p>
        商品名<br>
        <input type="text" name="goods_name" value="{{ old('goods_name') }}">
      </p>
      <p>
        商品説明<br>
        <textarea name="comment" rows="10" cols="50">{{ old('comment') }}</textarea>
      </p>
      <p>
        価格<br>
        <input type="text" name="price" value="{{ old('price') }}">円
      </p>
      <p>
        在庫<br>
        <input type="text" name="stock" value="{{ old('stock') }}">個
      </p>
      <p>
        <input type="submit" name="submit" value="追加">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="/">一覧に戻る</a>
  </div>
</body>
</html>
