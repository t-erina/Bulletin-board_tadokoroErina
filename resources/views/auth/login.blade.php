@extends('layout.logout')

@section('title', 'ログイン')

@section('content')

<div class="container">
    <form action="/loginForm" id="login" method="post">
        @csrf
        <div class="login_form">
            <label class="login_form_item">メールアドレス</label>
            <input class="login_form_item" type="text" name="email">
        </div>

        <div class="login_form">
            <label class="login_form_item">パスワード</label>
            <input class="login_form_item" type="password" name="password">
        </div>

        <div class="d-md-flex justify-content-md-end">
            <input type="submit" value="ログイン" class="btn btn-primary">
        </div>

    </form>

    <div class="text-center">
        <p>新規ユーザー登録は<a href="/register">こちら</a></p>
    </div>
</div>

@endsection
