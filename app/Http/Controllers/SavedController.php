<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\User;
use App\Post;
use App\Saved;

class SavedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nickname)
    {
        $user = User::where('nickname', $nickname)->first();

        $posts = $user->saveds()->paginate(8);

       // dd($user);


        //$posts = Post::with('mainImage')->first();

        //dd($posts->mainImage()->get());
/*
        $posts = DB::table('posts')->
            ->join('saveds', 'posts.id', '=', 'saveds.post_id') //su post
            ->where('saveds.user_id', $user->id) //su user
            ->paginate(8);
            //->get();
*/
        //dd($posts);

/*
        SELECT c.class_id, name
        FROM student_classes sc
        INNER JOIN classes c ON c.class_id = sc.class_id
        WHERE sc.student_id = Y
  */
        //dd($savedPosts);

        return view('posts.index' , compact('posts'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($post)
    {

        if(auth()->id()) {

            $save = Saved::firstOrCreate(array('user_id' => auth()->id(), 'post_id' => $post));

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
    public function destroy($post)
    {

        if(auth()->id()) {

            //$save = Saved::firstOrCreate(array('user_id' => auth()->id(), 'post_id' => $post));

            $save = DB::table('saveds')
                ->where('user_id', auth()->id())
                ->where('post_id', $post)
                ->delete();

            return back();
        }

        return redirect('/login');




    }
}
