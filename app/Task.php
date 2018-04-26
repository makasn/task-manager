<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [
        'id', 'user_id',
    ];

    /**
     * タスク所有ユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
