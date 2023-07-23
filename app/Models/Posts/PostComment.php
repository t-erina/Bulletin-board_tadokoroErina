<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $table = 'post_comments';

    protected $fillable = [
        'user_id',
        'post_id',
        'delete_user_id',
        'update_user_id',
        'comment',
        'event_at',
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Posts\Post');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\Users\User');
    }

    public function postCommentsGet($post_id)
    {
        return $this->where('post_id', $post_id);
    }
}
