@extends('layout.login')

@section('title', '新規投稿作成')

@section('content')

<div class="row">
    <form class="post_form col-6" action="{{ route('createPost') }}" method="post">
        @csrf
        <div class="post_form_content">
            @if ($errors->has('sub_category_id'))
            <ul>
                @foreach ($errors->get('sub_category_id') as $message)
                <li class="error_message">{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            <label class="post_form_item">サブカテゴリー</label>
            <select name="sub_category_id" class="post_form_item">
                <option value="" selected>---</option>
                @foreach($categories as $category)
                <optgroup label="{{ $category->main_category }}">
                    @foreach($category->postSubCategories as $sub_category)
                    <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category }}</option>
                    @endforeach
                </optgroup>
                @endforeach
            </select>
        </div>

        <div class="post_form_content">
            @if ($errors->has('title'))
            <ul>
                @foreach ($errors->get('title') as $message)
                <li class="error_message">{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            <label class="post_form_item">タイトル</label>
            <input type="text" name="title" class="post_form_item">
        </div>

        <div class="post_form_content">
            @if ($errors->has('post'))
            <ul>
                @foreach ($errors->get('post') as $message)
                <li class="error_message">{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            <label class="post_form_item">投稿内容</label>
            <textarea class="post_form_item" name="post" cols="30" rows="10"></textarea>
        </div>

        <div class="post_form_btn">
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </form>
</div>

@endsection