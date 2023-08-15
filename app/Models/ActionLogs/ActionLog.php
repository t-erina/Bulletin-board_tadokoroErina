<?php

namespace App\Models\ActionLogs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ActionLog extends Model
{
    protected $table = 'action_logs';

    protected $fillable = [
        'user_id',
        'post_id',
        'event_at',
    ];

    public function countView ($post_id) {
        return $this->where('post_id', $post_id)->get()->count();
    }

    public function firstVisit ($post_id, $user_id) {
        $event_at = now();
        ActionLog::create([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'event_at' => $event_at,
        ]);
    }
}
