<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>商品一覧 | 管理ページ</title>
  <link rel="stylesheet" href="/css/shop.css">
</head>
<body>
  <h1>商品一覧 | 管理ページ</h1>
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
          <p>
            <a href="/edit/{{ $g->id }}">修正</a>
          </p>
          <p>
            <a href="/upload/{{ $g->id }}/{{ $g->name }}">画像</a>
          </p>
          <p>
            <form action="/destroy/{{ $g->id }}" id="form_{{$g->id}}" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <a href="#" data-id="{{ $g->id }}" class="btn" onclick="deleteGoods(this);">削除</a>
            </form>
          </p>
        </td>
      </tr>
    @endforeach
  </table>
  <div class="base">
    <a href="/create">新規追加</a>
    <a href="/admin" target="blank">サイト確認</a>
      <button class="btn" type="button" onclick="location.href='/auth/logout'">ログアウト</butt
  </div>
</body>
<script type="text/javascript">
  'use strict';
  function deleteGoods(e) {

    if (confirm('{{ $g->name }}を削除してもよろしいですか？')) {
        document.getElementById('form_' + e.dataset.id).submit();
    }
  }
</script>
</html>
