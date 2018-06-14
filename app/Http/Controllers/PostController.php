<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\PostType;
use App\Saved;
use App\Vote;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;
use Carbon\Carbon;




class PostController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth')->except(['index', 'show']);

    }


    public function index()
    {
        //$posts = Post::all();
        //$posts = Post::latest()->get();


        //$posts = Post::latest();
        $posts = Post::latest();


        if($user = request('user')) {

            //$posts =


        }


        if($category = request('category'))
        {
            $category = Category::where('name', $category)->first();
            // dd($category);
            $posts->where('category_id', $category->id);
            //dd($posts->first());
        }

        //dd(request());

        if($postType = request('post-type'))
        {
            $postType = PostType::where('name', $postType)->first();
            // dd($category);
            $posts->where('type_id', $postType->id);
            //dd($posts->first());
        }

        if($month = request('month'))
        {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = request('year'))
        {
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->paginate(8);
        //$posts = $posts->get();

        // $archives = Post::archives();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $postTypes= PostType::pluck('name', 'id');

        return view('posts.create', compact('categories', 'postTypes'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        $userVote = 0;
        $userSaved = 0;

        if(auth()->id()) {

            $userVote = Vote::select('upvote')
                ->where('user_id', auth()->id())
                ->where('post_id', $post->id)->first();

            $userSaved = Saved::select()
                ->where('user_id', auth()->id())
                ->where('post_id', $post->id)->exists();
        }

        //dd($userSaved);

        return view('posts.show', compact('post', 'userVote', 'userSaved'));
    }
    /*
     * kitas variantas
        public function show(Post $post)
        {
            return view('posts.show', compact('post'));
        }
    */


    public function store()
    {
        //dd(request()->all());

        $values = request()->all();

        $categoryCount = Category::all()->count();
        $typeCount = PostType::all()->count();

        $this->validate(request(), [
            'title' => 'required|max:30',
            'body' => 'required',
            'category_id' => 'required|numeric|between:0,'.$categoryCount,
            'type_id' => 'required|numeric|between:0,'.$typeCount,
            'price' => 'required|numeric|min:0',
            'mainImage' => 'required|file|mimes:jpeg,bmp,png|max:3072'
        ]);


        //$post = $this->createPost($values);
        //$image = $this->createImage($post);

        $tags = $this->getHashTags($values['tags']);
        if((!is_null($tags)) && !(empty($tags)))
        {
            $tagss = array_map(function ($tag) {
                return ['name' => $tag];
            }, $tags);
        }

        $post = $this->createPost($values);



        if((!is_null($tags)) && !(empty($tags)))
        {
            foreach ($tagss as $tag)
            {

                $tagObj = Tag::firstOrCreate(array('name' => $tag['name']));
                //dd($tagObj->id);
                $post->tags()->attach($tagObj->id);
            }
        }


        //$post->tag($tags);

        //$image = $this->createImage($post);


        $post_id = $post->id;
        $user_id = $post->user_id;

        //image upload
        $mainImage = request()->mainImage->store('images/' . $user_id . '/' . $post_id);

        $image = new Image;

        $image->post_id = $post_id;
        $image->isMain = true;
        $image->filename = $mainImage;

        $image->save();

        // dd($values['tags'] = $tagss);
        /*
                DB::transaction(function ($values) {


                    $post = $this->createPost($values);

                    $tagss = $values['tags'];

                    foreach ($tagss as $tag)
                    {
                        $$post->tags()->firstOrCreate($tag);
                    }

                    $image = $this->createImage($post);

                }, 5);
        */
        /*
                $connection = $this->getConnection();

                $connection->transaction(function () use ($data, $tags) {
                    $job = $this->createJob($data);

                    foreach ($tags as $tag)
                    {
                        $job->tags()->firstOrCreate($tag);
                    }
                });
        */

        // pirmas budas, bet tada reikia Post modelyje prideti protected fillable

        /*    Post::create([

                'title' => request('title'),
                'body' => request('body')
            ]);
        */

        // antras budas
        // create new post using the request data

        /* dar vienas budas
        auth()->user()->publish(
            new Post(request(['title', 'body'])
        );
        */

        // and then redirect somewhere, maybe to the home page
        return redirect('/');
    }


    public function getHashTags($text) {
        preg_match_all('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', $text, $matchedHashtags);
        $hashtag = '';
        if (!empty($matchedHashtags[0])) {
            $stack = array();
            foreach ($matchedHashtags[0] as $match) {
                $stripped = preg_replace("/[^a-z0-9]+/i", "", $match);
                array_push($stack, $stripped);
                // $hashtag .= $stripped . ',';
            }
        } else {
            return null;
        }
        return $stack;
    }


    public function createPost($data)
    {
        $post = new Post;

        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->type_id = $data['type_id'];
        if (request()->has('forSale')) {
            $post->forSale= true;
        } else {
            $post->forSale= false;
        }
        $post->price = $data['price'];

        $post->user_id = auth()->id();

        // save it to the database
        $post->save();

        return $post;
    }

    public function createImage($data, Post $post)
    {
        $post_id = $post->id;
        $user_id = $post->user_id;

        //image upload
        $mainImage = request()->mainImage->store('images/' . $user_id . '/' . $post_id);

        $image = new Image;

        $image->post_id = $post_id;
        $image->isMain = true;
        $image->filename = $mainImage;

        $image->save();

        return $image;
    }

    public function createWithTags($data)
    {

        $tags = $this->getHashTags();
        $tags = array_map(function ($tag) {
            return ['name' => $tag];
        }, $tags);

        $connection = $this->job->getConnection();

        $connection->transaction(function () use ($data, $tags) {
            $job = $this->createJob($data);

            foreach ($tags as $tag)
            {
                $job->tags()->firstOrCreate($tag);
            }
        });



    }


}
