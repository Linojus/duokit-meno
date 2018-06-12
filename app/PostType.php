<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public static function postTypes()
    {
        return static::all()
            ->toArray();
    }

}
