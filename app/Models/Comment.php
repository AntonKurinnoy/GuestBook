<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'comment', 'user_id'
    ];

    /**
     * Get the user who added the comment
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
