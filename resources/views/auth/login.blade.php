@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
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
        <button class="btn btn-primary" type="button" onclick="location.href='/auth/register'">新規登録</button>
      </p>
    </form>
  </div>
  <div class="base">
    <a href="/">お買い物に戻る</a>
    <a href="cart.php">カートに戻る</a>
  </div>
@endsection
