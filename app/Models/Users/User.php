<?php

namespace App\Models\Users;

use App\Models\Posts\PostCommentFavorite;
use App\Models\Posts\PostFavorite;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'admin_role',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Posts\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Posts\PostComment');
    }

    public function is_Favo($post_id)
    {
        return PostFavorite::where('user_id', Auth::id())->where('post_id', $post_id)->first(['post_favorites.id']);
    }

    public function favoPostId()
    {
        return PostFavorite::where('user_id', Auth::id());
    }

    public function is_commentFavo($comment_id)
    {
        return PostCommentFavorite::where('user_id', Auth::id())->where('post_comment_id', $comment_id)->first(['post_comment_favorites.id']);
    }
}
