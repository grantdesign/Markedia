<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'site', 'text', 'post_id', 'is_check'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
