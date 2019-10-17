@extends('layouts.app')

@section('title', '商品画像アップロード')

@section('content')
  <h1>商品画像アップロード</h1>
  <div class="base">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <span class="error">{{ $error }}</span><br>
      @endforeach
    @endif
    <form action="upload" method="post" enctype="multipart/form-data">
      @csrf
      <p>
        {{ $name }}の商品画像（JPEGのみ）<br>
        <input type="file" name="pic">
      </p>
      <p>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000">
        <input type="submit" name="submit" value="追加">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="/">一覧に戻る</a>
  </div>
@endsection
