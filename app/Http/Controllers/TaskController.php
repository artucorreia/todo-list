<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $search = request('search');

        $tasks = $search ? 
            Task::where([
                ["name", 'like', "%$search%"]
            ])->get()
        :
            Task::orderBy("id","asc")->get()
        ;

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function show($id): View
    {
        $task = Task::findOrFail($id);
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

        return redirect('/')->with("msg", "Task created succesfully");
    }

    public function finishTask($id) 
    {
        
    // $task = Task::findOrFail($id);
    // $task->finished = true;
    // Task::update($task);
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect('/')->with("msg", "Task deleted succesfully");
    }
}
