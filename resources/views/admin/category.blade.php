@extends('layout.login')

@section('title', 'カテゴリー管理')
<div class="container_main col-8">
    <div class="main_category_card">
        <h3>メインカテゴリーの追加</h3>
        @if ($errors->has('main_category'))
        <ul>
            @foreach ($errors->get('main_category') as $message)
            <li class="error_message">{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        <form action="{{ route('createMainCategory') }}" method="post">
            @csrf
            <div class="category_content">
                <label class="category_form_item bullet">新規メインカテゴリー名</label>
                <input class="category_form_item" type="text" name="main_category">
            </div>
            <button class="category_form_item btn btn-primary" type="submit">登録</button>
        </form>
    </div>
    <div class="sub_category_card">
        <h3>サブカテゴリーの追加</h3>
        @if ($errors->has('main_category_id') || $errors->has('sub_category'))
        <ul>
            @foreach ($errors->all() as $message)
            <li class="error_message">{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        <form action="{{ route('createSubCategory') }}" method="post">
            @csrf
            <div class="category_content">
                <label class="category_form_item bullet">メインカテゴリー</label>
                <select name="main_category_id" class="category_form_item">
                    <option value="" selected>---</option>
                    @foreach($categories as $main_category)
                    <option value="{{ $main_category->id }}">{{ $main_category->main_category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="category_content">
                <label class="category_form_item bullet">新規サブカテゴリー名</label>
                <input class="category_form_item" type="text" name="sub_category">
            </div>
            <button class="category_form_item btn btn-primary" type="submit">登録</button>
        </form>
    </div>

    <div class="edit-category_card">
        <h3>カテゴリー一覧</h3>
        @csrf
        <ul class="edit-category_list">
            @foreach($categories as $category)
            <li class="edit-category_list_inner">
                <div class="main_category_list">
                    <span class="main_category_name">{{ $category->main_category }}</span>
                    @if(empty($category->postSubCategories()->first()))
                    <a class="category-delet-btn" href="{{ route('deleteMainCategory', $category->id) }}" onclick="return confirm('メインカテゴリーを削除してよろしいですか？')">削除</a>
                    @endif
                </div>
                <ul>
                    @foreach($category->postSubCategories as $sub_category)
                    <li class="sub_category_list">
                        <span class="sub_category_name">{{ $sub_category->sub_category }}<span class="count_num">({{ $sub_category->posts()->count() }})</span></span>
                        @if(empty($sub_category->posts()->first()))
                        <a class="category-delet-btn" href="/category/sub-delete/{{ $sub_category->id }}" onclick="return confirm('サブカテゴリーを削除してよろしいですか？')">削除</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
