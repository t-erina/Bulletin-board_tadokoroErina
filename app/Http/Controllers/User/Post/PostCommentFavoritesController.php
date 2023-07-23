<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Posts\PostCommentFavorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostCommentFavoritesController extends Controller
{
    public function favorite(Request $request)
    {
        $comment_id = $request->post_id;
        $user_id = Auth::id();

        $Commentfavorites = new PostCommentFavorite();

        $Commentfavorites->user_id = $user_id;
        $Commentfavorites->post_comment_id = $comment_id;
        $Commentfavorites->save();

        return response()->json();
    }

    public function unFavorite(Request $request)
    {
        $comment_id = $request->post_id;
        $user_id = Auth::id();

        $Commentfavorites = new PostCommentFavorite();
        $Commentfavorites->where('post_comment_id', $comment_id)
            ->where('user_id', $user_id)->delete();

        return response()->json();
    }
}
