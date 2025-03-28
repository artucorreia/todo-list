<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
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

    public function show(int $id): View
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
        $priorities = DB::table('priorities')
            ->orderBy('id', 'asc')
            ->select('priorities.name', 'priorities.id')
            ->get();
        return view('tasks.create', ['priorities' => $priorities]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = $request->validate([
            'name' => ['required', 'max:50', 'min:5'],
            'description' => ['nullable', 'min:1', 'max:255'],
            'priority' => ['required']
        ]);
    
        $task = new Task();
        $task->name = trim($validator['name']);
        $task->description = trim($validator['description'] ?? '');
        $task->priority_id = $validator['priority'];
        $task->save();

        return redirect('/tasks')->with('success', 'Task created succesfully');
    }

    public function edit(int $id): View
    {
        $task = DB::table('tasks')
            ->where('id', $id)
            ->firstOrFail();
        $priorities = DB::table('priorities')
            ->select('priorities.name', 'priorities.id')
            ->get();
        return view('tasks.edit',['task' => $task, 'priorities' => $priorities]);
    }

    public function update(Request $request): RedirectResponse 
    {
        $validator = $request->validate([
            'name' => ['nullable', 'max:50', 'min:5'],
            'description' => ['nullable', 'min:1', 'max:255']
        ]);

        $task = Task::findOrFail($request->id);

        if (
            $task->name != $validator['name'] 
            && isset($validator['name'])
        ) {
            $task->name = $validator['name'];
        } 

        if (
            $task->description != $validator['description'] 
            && isset($validator['description'])
        ) {
            $task->description = $validator['description'];
        }

        if (
            $task->priority_id != $request->priority 
            && isset($request->priority)
        ) { 
            $task->priority_id = $request->priority; 
        }
        
        $task->save();

        return redirect('/tasks')->with('success', 'Task updated succesfully');
    }

    public function markAsFinished(int $id): RedirectResponse
    {
        $affected = DB::table('tasks')
            ->where('id', $id)
            ->update(['finished' => true]);
        if($affected === 0) return redirect('/tasks')->with('error', 'No task found with the given id');
        return redirect('/tasks')->with('success', 'Task mark as finished succesfully');
    }

    public function destroy(int $id): RedirectResponse
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect('/tasks')->with("success", "Task deleted succesfully");
    }
}
