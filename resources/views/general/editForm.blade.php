@extends('layout.login')

@section('title', '投稿編集')

@section('content')

<div class="row">
    <div class="post_form col-6">
        <form action="{{ route('editPost') }}" method="post" id="editPostForm">
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
                <select class="post_form_item" name="sub_category_id">
                    @foreach($categories as $category)
                    <optgroup label="{{ $category->main_category }}">
                        @foreach($category->postSubCategories as $sub_category)
                        @if($sub_category->id == $post->post_sub_category_id)
                        <option selected value="{{ $sub_category->id }}">{{ $sub_category->sub_category }}</option>
                        @else
                        <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category }}</option>
                        @endif
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
                <input class="post_form_item" type="text" name="title" value="{{ $post->title }}">
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
                <textarea class="post_form_item" name="post" cols="30" rows="10">{{ $post->post }}</textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
        </form>
        <div class="edit_form_btn">
            <button class="btn btn-primary" type="submit" form="editPostForm">更新</button>
            <button class="btn btn-danger" type="submit" form="deletePostForm" onclick="return confirm('投稿を削除してよろしいですか？')">削除</button>
        </div>
        <form action="{{ route('deletePost', $post->id) }}" method="get" id="deletePostForm">@csrf</form>
    </div>
</div>

@endsection