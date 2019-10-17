@extends('layouts.app')

@section('title', 'Noodle Shop')

@section('content')
    <h1>Noodle Shop</h1>
    <div class="header">
    @if (Auth::check())
        <p style="line-height: 46px;">{{ \Auth::user()->name }}さん、こんにちは。
          <button class="btn btn-primary btn-hf" type="button" onclick="location.href='/auth/logout'">ログアウト</button>
        </p>
    @else
        <button class="btn btn-primary btn-hf" type="button" onclick="location.href='/auth/login'">ログイン</button>
        <button class="btn btn-primary btn-hf" type="button" onclick="location.href='/auth/register'">新規登録</button>
    @endif
    </div>
    <form action="/cart" method="post">
      {{ csrf_field() }}
      <table class="table">
        @foreach ($goods as $g)
          <tr>
            <td>
              <img src="/images/{{ $g->image }}.jpg" alt="">
            </td>
            <td>
              <p class="goods">{{ $g->name }}</p>
              <p>{{ $g->comment }}</p>
            </td>
            <td width="100">
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
      <div class="footer">
        <input class="btn btn-primary btn-hf" type="submit" value="カートへ">
      </div>
    </form>
@endsection
