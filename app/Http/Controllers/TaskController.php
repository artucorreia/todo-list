<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function findAll(): View
    {
        $tasks = Task::orderBy("id","asc")->get();
        return view('tasks.all-tasks', ['data' => $tasks]);
    }

    public function findById($id): View
    {
        $task = Task::find($id);
        return view('tasks.task', ['task' => $task]);
    }

    public function create(): View
    {
        $priorities = Priority::orderBy('id','asc')->get();
        return view('tasks.create', ['priorities' => $priorities]);
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $priority = json_decode($request->priority);
        $task->priority_id = $priority->id;
        $task->save();

        return redirect('/');
    }

    public function deleteById()
    {

    }
}
