<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'name', 'surname', 'nickname', 'description', 'contacts'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

/*
    public function getRouteKeyName()
    {
        return 'nickname';
    }
*/

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    //https://stackoverflow.com/questions/34897444/naming-tables-in-many-to-many-relationships-laravel?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
    public function votes()
    {
        return $this->belongsToMany(Vote::class);
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

/*
    public function publish(Post $post)
    {

        $this->posts()->save($post);

    }
*/
}
