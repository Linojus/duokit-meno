<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Post extends Model
{
    //tai ka leidziame
    protected $fillable = ['title', 'body', 'category_id', 'type_id', 'forSale', 'price', 'disabled'];

    //tai ko neleidziame
    //protected $guarded = ['user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function mainImage()
    {
        return $this->hasOne(Image::class)->where('isMain', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userVote()
    {
        $id = auth()->id();
        return $this->hasOne(Vote::class)->where('user_id', $id);
    }

    public function  userVotes()
    {
        return $this->hasMany(Vote::class)->where('upvote', '=' , 1 );
    }

    public function  userUpVotes()
    {
        return $this->hasMany(Vote::class)->where('upvote', '=' , 1 )
            ->select('upvote', DB::raw('count(*) as total'))
            ->groupBy('upvote');
    }




    public function addComment($body)
    {
        //pirmas budas

        $this->comments()->create([
            'body' => $body,
            'user_id' => auth()->id(),
            'post_id' => $this->id
        ]);


        //antras budas
        /*
        Comment::create([

            'body' => $body,
            'post_id' => $this->id

        ]);
        */
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }



    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //https://stackoverflow.com/questions/34897444/naming-tables-in-many-to-many-relationships-laravel?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
    public function votes()
    {
        return $this->belongsToMany(Vote::class);
    }


    public function postType()
    {
        return $this->belongsTo(PostType::class, 'type_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }




}
