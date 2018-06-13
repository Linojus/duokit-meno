<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use App\Post;

use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function downVote(Post $post)
    {

        if(auth()->id()) {

            $vote = Vote::where('user_id', auth()->id())
                ->where('post_id', $post->id)
                ->first();

            if (!is_null($vote)) {

                if($vote->upvote == true){

                    DB::table('votes')
                        ->where('user_id', auth()->id())
                        ->where('post_id', $post->id)
                        ->delete();

                }
            } else {

                $vote = new Vote;
                $vote->user_id = auth()->id();
                $vote->post_id = $post->id;
                $vote->upvote = false;
                $vote->save();
            }

            return back();
        }

        return redirect('/login');

    }

    public function upVote(Post $post)
    {

        if(auth()->id()) {

            $vote = Vote::where('user_id', auth()->id())
                ->where('post_id', $post->id)
                ->first();

            if (!is_null($vote)) {

                if($vote->upvote == false){

                    DB::table('votes')
                        ->where('user_id', auth()->id())
                        ->where('post_id', $post->id)
                        ->delete();

                }
            } else {

                $vote = new Vote;
                $vote->user_id = auth()->id();
                $vote->post_id = $post->id;
                $vote->upvote = true;
                $vote->save();

            }

            return back();
        }

        return redirect('/login');

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {


        if(auth()->id()) {

            $this->validate(request(), [
                'vote' => 'required|numeric|integer|between:-1,1'
            ]);

            $vote_val = request('vote');

            if ($vote_val != 0) {

                $vote_val = ($vote_val > 0 ? true : false);

                $vote = Vote::firstOrNew(array(
                    'user_id' => auth()->id(),
                    'post_id' => $post->id
                ));
                $vote->upvote = $vote_val;
                $vote->save;

            }

            return back();
        }

        return redirect('/login');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
