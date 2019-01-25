<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;

class Post extends Model
{
    use CanBeLiked;
    
    protected $fillable=[
        'content', 'author_id'//,'likes','replies'
    ];
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }

}
