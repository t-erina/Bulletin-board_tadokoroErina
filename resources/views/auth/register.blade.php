@extends('layout.logout')

@section('title', 'ユーザー登録')

@section('content')

<div>
    <form action="/storeUser">
        @csrf
        <div class="register_form">
            @if ($errors->has('username'))
            <ul>
                @foreach ($errors->get('username') as $message)
                <li class="error_message">{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            <label class="register_form_item">ユーザー名
                <input class="register_form_item" type="text" name="username">
            </label>
        </div>
        <div class="register_form">
            @if ($errors->has('email'))
            <ul>
                @foreach ($errors->get('email') as $message)
                <li class="error_message">{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            <label class="register_form_item">メールアドレス
                <input class="register_form_item" type="text" name="email">
            </label>
        </div>
        <div class="register_form">
        @if ($errors->has('password'))
            <ul>
                @foreach ($errors->get('password') as $message)
                <li class="error_message">{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            <label class="register_form_item">パスワード
                <input class="register_form_item" type="password" name="password">
            </label>
        </div>
        <div class="register_form">
            <label class="register_form_item">パスワード確認
                <input class="register_form_item" type="password" name="password_confirmation">
            </label>
        </div>

        <div class="d-md-flex justify-content-md-end">
            <input type="submit" value="確認" class="btn btn-primary">
        </div>
    </form>
</div>

@endsection