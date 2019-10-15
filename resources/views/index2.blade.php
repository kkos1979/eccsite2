<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Noodle Shop</title>
  <link rel="stylesheet" href="/css/shop.css">
</head>
<body>
  <div class="container">
    <h1>Noodle Shop</h1>
    <div class="base">
    @if (Auth::check())
        <p>{{ \Auth::user()->name }}さん、こんにちは。</p>
        <p>
          <button class="btn" type="button" onclick="location.href='/auth/logout'">ログアウト</button>
        </p>
    @else
        <button class="btn" type="button" onclick="location.href='/auth/login'">ログイン</button>
        <button class="btn" type="button" onclick="location.href='/auth/register'">新規登録</button>
    @endif
    </div>
    <form action="/cart" method="post">
      {{ csrf_field() }}
      <table>
        @foreach ($goods as $g)
          <tr>
            <td>
              <img src="/images/{{ $g->image }}.jpg" alt="">
            </td>
            <td>
              <p class="goods">{{ $g->name }}</p>
              <p>{{ $g->comment }}</p>
            </td>
            <td width="80">
              <p>{{ $g->price }}円</p>
              <p>在庫 {{ $g->stock }} 個</p>
            </td>
            <td>
              @if ($g->stock > 0)
                <select name="num_{{ $g->id }}">
                  @for ($i = 0; $i <= $g->stock; $i++)
                    <option>{{ $i }}</option>
                  @endfor
                </select>
              @else
                <p>品切れ中</p>
              @endif
            </td>
          </tr>
        @endforeach
      </table>
      <div class="base">
        <input type="submit" value="カートへ">
      </div>
    </form>
  </div>
</body>
</html>
