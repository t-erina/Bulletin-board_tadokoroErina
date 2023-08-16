<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentsRequest;
use App\Models\Posts\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    public function createComment(StoreCommentsRequest $request)
    {
        $user_id = Auth::id();
        $post_id = $request->input('post_id');
        $comment = $request->input('comment');
        $event_at = now();

        PostComment::create([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'comment' => $comment,
            'event_at' => $event_at,
        ]);

        return back();
    }

    public function editForm($comment_id)
    {
        $comment = PostComment::where('id', $comment_id)->first();
        return view('general.editCommentForm', compact('comment'));
    }

    public function editComment(StoreCommentsRequest $request)
    {
        $comment_id = $request->input('comment_id');
        $comment = $request->input('comment');
        $post_id = $request->input('post_id');

        PostComment::where('id', $comment_id)->update([
            'comment' => $comment,
        ]);

        return redirect(route('postDetail', $post_id));
    }

    public function deleteComment(Request $request)
    {
        $comment_id = $request->input('comment_id');

        PostComment::where('id', $comment_id)->delete();

        return redirect(route('top'));
    }
}
