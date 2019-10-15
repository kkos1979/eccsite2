@extends('layouts.app')

@section('title', '購入 | Noodle Shop')

@section('content')
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
        お名前(必須)：<br>
        <input type="text" name="name" value="{{ old('name') ?? \Auth::user()->name ?? '' }}">
      </p>
      <p>
        ご住所(必須)：<br>
        <input type="text" name="address" size="60" value="{{ old('address') ?? \Auth::user()->address ?? ''}}">
      </p>
      <p>
        電話番号(必須)：<br>
        <input type="text" name="tel" value="{{ old('tel') ?? \Auth::user()->tel ?? ''}}">
      </p>
      <p>
        メールアドレス：<br>
        <input type="text" name="email" value="{{ old('email') ?? \Auth::user()->email ?? ''}}">
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
      <button class="btn btn-primary" type="button" onclick="location.href='/auth/login'">ログイン</button>
    @endif
  </div>
@endsection
