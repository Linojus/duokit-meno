<?php

//use App\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//post routes
Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');

Route::get('/posts/tags/{tag}', 'TagController@index');

Route::get('/posts/categories/{category}', 'CategoryController@index');



Route::post('/posts/{post}/comments', 'CommentController@store');
Route::delete('/posts/{post}/comments/{comment}', 'CommentController@destroy');

Route::post('/posts/{post}/vote', 'VoteController@store');

Route::post('/posts/{post}/upvote', 'VoteController@upVote');
Route::post('/posts/{post}/downvote', 'VoteController@downVote');

Route::post('/posts/{post}/disable', 'PostController@disable');
Route::post('/posts/{post}/enable', 'PostController@enable');

// saved posts
Route::get('/user/{nickname}/saved', 'SavedController@index');
Route::post('/user/{post}/saved', 'SavedController@store');
Route::delete('/user/{post}/saved', 'SavedController@destroy');


//users
Route::get('/user/{nickname}', 'UserController@show');


//random routes
Route::get('/about', function() {

    return view('about');

})->name('about');





//people
Route::get('people', function () {

    $people = DB::table('people')->get();

    return view('people.index', [
        'people' => $people
    ]);
});

Route::get('people/{id}', function ($id) {

    $person = DB::table('people')->find($id);

    //dd($person);

      return view('people.show', [
        'person' => $person
    ]);

});



//tasks

Route::get('tasks', 'TasksController@index');
Route::get('tasks/{task}', 'TasksController@show');

/*
Route::get('taskss', function () {

    //$tasks = DB::table('tasks')->get();
    $tasks = Task::all();

    return view('tasks.index', [
        'tasks' => $tasks
    ]);

});

Route::get('tasks/{id}', function ($id) {

//    $task = DB::table('tasks')->find($id);
    $task = Task::find($id);
//    dd($task);

    return view('tasks.show', [
        'task' => $task
    ]);

});
*/

Route::get('ID/{id}',function($id){
    echo 'ID: '.$id;
});

Route::get('user/{name?}', function ($name = 'TutorialsPoint') {
    return $name;
});

Route::get('users', function()
{
    return 'Users!';
});

//https://stackoverflow.com/questions/44716379/laravel-5-4-24-throws-methodnotallowedhttpexception-during-logout-of-users?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

// authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
