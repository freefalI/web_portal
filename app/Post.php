<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'content', 'owner_id'
    ];
    public function author()
    {
        return $this->belongsTo(User::class,'owner_id');
    }

}
