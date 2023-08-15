@extends('layout.login')

@section('title', '投稿詳細')

@section('content')
<div class="container_main">
    <div class="post_card">
        <div class="post_info">
            <div class="post_info_content">
                <span class="post_info_item">{{ $post->user->username }}さん</span>
                <time class="post_info_item">{{ $post->event_at->format('Y年n月j日') }}</time>
            </div>
            <span class="post_info_item">{{ $countView->countView($post->id) }} View</span>
        </div>
        <div class="post">
            <div class="post_content">
                <h3>{{ $post->title }}</h3>
                @if($post->user_id == Auth::id())
                <a href="/post/edit-form/{{ $post->id }}" class="post_content_item"><i class="icon_margin bi bi-pencil-square"></i>編集</a>
                @endif
            </div>
            <div class="post_body">
                <p>{{ $post->post }}</p>
            </div>
        </div>
        <div class="post_action">
            <div class="post_action_content">
                <button type="submit" class="post_action_item category_btn" name="category_word" value="{{ $post->postSubCategory->sub_category }}" form="searchPost">{{ $post->postSubCategory->sub_category }}</button>
            </div>
            <div class="post_action_content">
                <span class="post_action_item">
                    <i class="bi bi-chat-dots"></i>
                    <span>{{ $comments->count() }}</span>
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

    @foreach($comments as $comment)
    <div class="comment_card">
        <div class="comment_info">
            <div class="comment_info_content">
                <span class="comment_info_item">{{ $comment->user->username }}さん</span>
                <time class="comment_info_item">{{ $comment->event_at }}</time>
            </div>
            <div class="comment_info_content">
                @if($comment->user_id == Auth::id())
                <a  href="{{ route('editCommentForm', $comment->id) }}"><i class="icon_margin bi bi-pencil-square"></i>編集</a>
                @endif
            </div>
        </div>

        <div class="comment">
            <div class="comment_content">
                <p>{{ $comment->comment }}</p>
            </div>
            <div class="comment_action">
                <div class="comment_action_content">
                    @if(Auth::user()->is_commentFavo($comment->id))
                    <span class="comment_action_item">
                        <i class="bi bi-suit-heart-fill unfavo_btn" post_id="{{ $comment->id }}" data-route="{{ route('commentUnfavorite', $comment->id) }}"></i>
                        <span>{{ $commentFavorites->commentFavoCounts($comment->id) }}</span>
                    </span>
                    @else
                    <span class="comment_action_item">
                        <i class="bi bi-suit-heart favo_btn" post_id="{{ $comment->id }}" data-route="{{ route('commentFavorite', $comment->id) }}"></i>
                        <span>{{ $commentFavorites->commentFavoCounts($comment->id) }}</span>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="comment_form">
        @if ($errors->has('comment'))
        <ul>
            @foreach ($errors->get('comment') as $message)
            <li class="error_message">{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        <form action="{{ route('createComment') }}" method="post">
            @csrf
            <div class="comment_form_content">
                <textarea class="comment_form_item" name="comment" rows="10" placeholder="コメントを入力"></textarea>
            </div>
            <div class="comment_form_btn">
                <button type="submit" class="btn btn-primary">コメント</button>
            </div>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
        </form>
    </div>
    <form action="{{ route('top') }}" id="searchPost" method="get">@csrf</form>
</div>
@endsection