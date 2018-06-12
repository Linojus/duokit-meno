<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends Controller
{
    public function store(Post $post)
    {

        if(auth()->id()) {
            $this->validate(request(), ['body' => 'required|min:2|max:300']);

            //pirmas budas
            $post->addComment(request('body'));

            //antras budas
            /*
                    Comment::create([

                        'body' => request('body'),
                        'post_id' => $post->id

                    ]);
            */

            return back();
        }

        return redirect('/login');
    }

    public function disable($id) {


    }




}
