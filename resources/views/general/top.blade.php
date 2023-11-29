@extends('layout.login')

@section('title', '投稿一覧')

@section('content')
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
    <form action="{{ route('top') }}" id="searchPost" method="get">@csrf</form>
    <form action="{{ route('top') }}" id="searchCategory" method="get">@csrf</form>
</div>
@endsection
