<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;
use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;

class Post extends Model implements LikeableContract
{
    use Likeable;
    
    protected $fillable=[
        'content', 'author_id'//,'likes','replies'
    ];
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }

}
