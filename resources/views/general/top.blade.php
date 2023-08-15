@extends('layout.login')

@section('title', '投稿一覧')

@section('content')
<div class="row">
    <div class="container_main col-8">
        @foreach($posts as $post)
        <div class="post_card">
            <div class="post_info">
                <div class="post_info_content">
                    <span class="post_info_item">{{ $post->user->username }}さん</span>
                    <time class="post_info_item">{{ $post->event_at->format('Y年n月j日') }}</time>
                </div>
                <span class="post_info_item">{{ $countView->countView($post->id) }} View</span>
            </div>
            <h3><a href=" {{ route('postDetail', $post->id) }}">{{ $post->title }}</a></h3>
            <div class="post_action">
                <div class="post_action_content">
                    <button type="submit" class="post_action_item category_btn" name="category_word" value="{{ $post->postSubCategory->sub_category }}" form="searchCategory">{{ $post->postSubCategory->sub_category }}</button>
                </div>
                <div class="post_action_content">
                    <span class="post_action_item">
                        <i class="bi bi-chat-dots"></i>
                        <span>{{ $comments->postCommentsGet($post->id)->count() }}</span>
                    </span>
                    @if(Auth::user()->is_Favo($post->id))
                    <span class="post_action_item">
                        <i class="bi bi-suit-heart-fill unfavo_btn" post_id="{{ $post->id }}" data-route="{{ route('postUnfavorite', $post->id) }}"></i>
                        <span>{{ $postFavorites->postFavoCounts($post->id) }}</span>
                    </span>
                    @else
                    <span class="post_action_item">
                        <i class="bi bi-suit-heart favo_btn" post_id="{{ $post->id }}" data-route="{{ route('postFavorite', $post->id) }}"></i>
                        <span>{{ $postFavorites->postFavoCounts($post->id) }}</span>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="container_side col-3">
        <div class="sidebar_content d-grid gap-2">
            @can('admin')
            <a class="btn btn-primary" href="{{ route('category') }}">カテゴリー管理</a>
            @endcan
            <a class="btn btn-primary" href="{{ route('createPostForm') }}">投稿</a>
        </div>

        <div class="sidebar_content">
            <p class="sidebar_content_title">検索</p>
            <div class="search_content">
                <input type="text" form="searchPost" name="keyword" value="{{ session()->get('keyword') }}" class="search_form_item">
                <button form="searchPost" class="search_btn search_form_item"><i class="bi bi-search"></i></button>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" name="favorite_post" value="favorite_post" form="searchPost" class="btn btn-primary">いいねした投稿</button>
                <button type="submit" name="auth_post" value="auth_post" form="searchPost" class="btn btn-primary">自分の投稿</button>
            </div>
        </div>

        <div class="sidebar_content">
            <p class="sidebar_content_title">カテゴリー</p>
            @foreach($categories as $category)
            <ul class="categoryList_main">
                <li>
                    <div class="category_list">
                        <span class="main_category_name bullet">{{ $category->main_category }}</span>
                    </div>
                    <ul class="categoryList_sub">
                        @foreach($category->postSubCategories as $sub_category)
                        <li class="categoryList_sub_item">
                            <button type="submit" class="subCategory_btn category_btn" name="category_word" value="{{ $sub_category->sub_category }}" form="searchCategory">{{ $sub_category->sub_category }}</button>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
    <form action="{{ route('top') }}" id="searchPost" method="get">@csrf</form>
    <form action="{{ route('top') }}" id="searchCategory" method="get">@csrf</form>
</div>

@endsection