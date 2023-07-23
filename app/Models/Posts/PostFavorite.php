<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostFavorite extends Model
{
    protected $table = 'post_favorites';

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    public function postFavoCounts($post_id)
    {
        return $this->where('post_id', $post_id)->get()->count();
    }
}
