<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;

class Post extends Model implements Commentable
{
    use CanBeLiked;
    use HasComments;
    protected $fillable = [
        'content', 'author_id'//,'likes','replies'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}
