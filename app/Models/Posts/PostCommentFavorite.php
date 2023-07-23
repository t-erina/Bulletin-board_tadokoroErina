<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostCommentFavorite extends Model
{
    protected $table = 'post_comment_favorites';

    protected $fillable = [
        'user_id',
        'post_comment_id',
    ];

    public function PostComment()
    {
        return $this->belongsTo('App\Models\Posts\PostComment');
    }

    public function commentFavoCounts($comment_id)
    {
        return $this->where('post_comment_id', $comment_id)->get()->count();
    }
}
