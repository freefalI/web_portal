<?php

namespace App;

use Actuallymab\LaravelComment\Models\Comment as LaravelComment;

class Comment extends LaravelComment
{

    public function author()
    {
        return $this->belongsTo(User::class, 'commented_id');
    }

}