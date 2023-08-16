@extends('layout.login')

@section('title', 'コメント編集')

@section('content')

<div class="row">
    <div class="post_form col-6">
        <form action="{{ route('editComment') }}" method="post" id="editPostForm">
            @csrf
            <div class="comment_detailForm_content">
                @if ($errors->has('comment'))
                <ul>
                    @foreach ($errors->get('comment') as $message)
                    <li class="error_message">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                <label class="comment_detailForm_item">コメント</label>
                <textarea class="comment_detailForm_item" name="comment" cols="30" rows="10">{{ $comment->comment }}</textarea>
            </div>
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
        </form>
        <div class="edit_form_btn">
            <button class="btn btn-primary" type="submit" form="editPostForm">更新</button>
            <button class="btn btn-danger" type="submit" form="deleteCommentForm" onclick="return confirm('コメントを削除してよろしいですか？')">削除</button>
        </div>
        <form action="{{ route('deleteComment', '$post->id') }}" method="get" id="deleteCommentForm">@csrf</form>
        <input type="hidden" name="comment_id" value="{{ $comment->id }}" form="deleteCommentForm">
    </div>
</div>

@endsection