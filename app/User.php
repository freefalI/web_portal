<?php

namespace App;

use App\Post;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Traits\CanLike;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Actuallymab\LaravelComment\CanComment;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use Notifiable;
    use CanLike;
    use CanFollow;
    use CanBeFollowed;

    use HasMediaTrait;
    use CanComment;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nickname', 'account_type', 'has_avatar'
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
        return $this->account_type == "public";
    }

    public function hasPrivateAccount()
    {
        return $this->account_type == "private";
    }

    public function scopeWithPublicAccount($query)
    {
        return $query->where('account_type', "public");
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(60)
            ->height(60);
    }

    public function incomingFollowRequests()
    {
        return $this->hasMany(FollowRequest::class, 'requested_user_id');
    }

    public function outgoingFollowRequests()
    {
        return $this->hasMany(FollowRequest::class, 'requesting_user_id');
    }

    public function acceptFollowRequest(FollowRequest $followRequest)
    {
        dd($followRequest);
        return $this->hasMany(FollowRequest::class, 'requesting_user_id');
    }

    public function sentFollowRequestTo(User $user)
    {
        return FollowRequest::where([
            "requesting_user_id" => auth()->user()->id,
            "requested_user_id" => $user->id
        ])->count();
    }

    // make email verification queued
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailQueued());
    }

}
