<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $search = request('search');

        $tasks = $search ?
            DB::table('tasks')
            ->join('priorities', 'tasks.priority_id', '=', 'priorities.id')
            ->whereLike('tasks.name', "%$search%")
            ->select('tasks.*', 'priorities.name AS priorityName')
            ->orderBy("finished", "asc")
            ->get()
        :
            DB::table('tasks')
            ->join("priorities", 'tasks.priority_id', '=', 'priorities.id')
            ->select('tasks.*', 'priorities.name AS priorityName')
            ->orderBy("finished", "asc")
            ->get();
        ;

        return view('tasks.index', ['tasks' => $tasks, 'search' => $search]);
    }

    public function show($id): View
    {
        $task = DB::table('tasks')
            ->join('priorities', 'tasks.priority_id', '=', 'priorities.id')
            ->where('tasks.id', "=", $id)
            ->select('tasks.*', 'priorities.name AS priorityName')
            ->firstOrFail();

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

        return redirect('/tasks')->with('success', 'Task created succesfully');
    }

    public function edit($id): View
    {
        $task = Task::findOrFail($id);
        $priorities = Priority::all();
        return view('tasks.edit',['task' => $task, 'priorities' => $priorities]);
    }

    public function update(Request $request) 
    {
        $task = Task::findOrFail($request->id);
        $task->name = $request->name;
        $task->description = $request->description;
        if($request->priority) {
            $priority = json_decode($request->priority);
            $task->priority_id = $priority->id;
        }
        
        if (!$task->isDirty()) return redirect('/tasks');

        $task->save();
        return redirect('/tasks')->with('success', 'Task updated succesfully');
    }

    public function markAsFinished($id)
    {
        $affected = DB::table('tasks')
            ->where('id', $id)
            ->update(['finished' => true]);
        if($affected === 0) return redirect('/tasks')->with('error', 'No task found with the given id');
        return redirect('/tasks')->with('success', 'Task mark as finished succesfully');
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect('/tasks')->with("success", "Task deleted succesfully");
    }
}
