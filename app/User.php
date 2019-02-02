<?php

namespace App;

use App\Post;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Traits\CanLike;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use CanLike;
    use CanFollow;
    use CanBeFollowed;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nickname', 'account_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function isAuthor(Post $post)
    {
        return $post->author_id == $this->id;
    }

    public function hasPublicAccount()
    {
        return $this->account_type=="public";
    }

    public function scopeWithPublicAccount($query)
    {
        return $query->where('account_type', "public");
    }
}
