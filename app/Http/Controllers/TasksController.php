<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        //$tasks = DB::table('tasks')->get();
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function show(Task $task) //task::find(wildcard);
    {
        //$task = Task::find($id);
//    dd($task);

        return view('tasks.show', [
            'task' => $task
        ]);
    }

}
