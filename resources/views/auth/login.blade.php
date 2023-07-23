@extends('layout.logout')

@section('title', 'ログイン')

@section('content')

<div>
    <form action="/loginForm" id="login" method="post">
        @csrf
        <div>
            <label>メールアドレス
                <input type="text" name="email">
            </label>
        </div>

        <div>
            <label>パスワード
                <input type="password" name="password">
            </label>
        </div>
        <input type="submit" value="ログイン">
    </form>

    <p>新規ユーザー登録は<a href="/register">こちら</a></p>
</div>

@endsection