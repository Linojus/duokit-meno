<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
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


    public function destroy($post, $comment)
    {

        if(auth()->id()) {

            if(Auth::user()->role->name == "Administratorius") {
                $save = DB::table('comments')
                    //->where('user_id', auth()->id())
                    ->where('post_id', $post)
                    ->where('id', $comment)
                    ->delete();
            } else {

                $save = DB::table('comments')
                    ->where('user_id', auth()->id())
                    ->where('post_id', $post)
                    ->where('id', $comment)
                    ->delete();
            }

            return back();
        }

        return redirect('/login');
    }




}
