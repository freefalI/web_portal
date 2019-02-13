<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowRequest extends Model
{
    protected $fillable = [
        "requesting_user_id", "requested_user_id"
//        'content', 'author_id'//,'likes','replies'
    ];

    public function requestedUser()
    {
        return $this->belongsTo(User::class, 'requested_user_id');
    }

    public function requestingUser()
    {
        return $this->belongsTo(User::class, 'requesting_user_id');
    }
}
