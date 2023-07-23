<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Posts\PostFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostFavoritesController extends Controller
{
    public function favorite(Request $request)
    {
        $post_id = $request->post_id;
        $user_id = Auth::id();

        $Postfavorites = new PostFavorite();

        $Postfavorites->user_id = $user_id;
        $Postfavorites->post_id = $post_id;
        $Postfavorites->save();

        return response()->json();
    }

    public function unFavorite(Request $request)
    {
        $post_id = $request->post_id;
        $user_id = Auth::id();

        $Postfavorites = new PostFavorite();
        $Postfavorites->where('post_id', $post_id)
            ->where('user_id', $user_id)->delete();

        return response()->json();
    }
}
