@extends('layout.logout')

@section('title', '登録ありがとうございます')

@section('content')

<div class="added_content">
    <p class="added_item">ようこそ {{ session()->pull('newUserName') }}殿</p>
    <a href="/login">ログイン画面へ</a>
</div>

@endsection