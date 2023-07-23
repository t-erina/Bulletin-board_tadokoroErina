@extends('layout.logout')

@section('title', 'ユーザー登録')

@section('content')

<div>
    <form action="/storeUser">
        @csrf
        <div>
            <label>ユーザー名
                <input type="text" name="username">
            </label>
        </div>
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
        <div>
            <label>パスワード確認
                <input type="password" name="password_confirmation">
            </label>
        </div>

        <input type="submit" value="確認">
    </form>
</div>

@endsection