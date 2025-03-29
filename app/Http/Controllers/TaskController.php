<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $tasks = DB::table('tasks')
            ->join('priorities', 'tasks.priority_id', '=', 'priorities.id')
            ->where('tasks.user_id', '=', $userId)
            ->select(
                'tasks.id',
                'tasks.name',
                'priorities.name AS priority_name',
                'tasks.created_at',
                'tasks.updated_at',
                'tasks.finished',
            )
            ->orderBy('finished', 'asc')
            ->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function show($id): View
    {
        $userId = Auth::user()->id;
        $task = DB::table('tasks')
            ->join('priorities', 'tasks.priority_id', '=', 'priorities.id')
            ->where('tasks.id', '=', $id)
            ->where('tasks.user_id', '=', $userId)
            ->select('tasks.*', 'priorities.name AS priorityName')
            ->firstOrFail();

        return view('tasks.show', ['task' => $task]);
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
            'priority' => ['required'],
        ]);

        $task = new Task();
        $task->name = trim($validator['name']);
        $task->description = trim($validator['description'] ?? '');
        $task->priority_id = $validator['priority'];
        $userId = (string) Auth::user()->id;
        $task->user_id = $userId;
        $task->save();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created succesfully');
    }

    public function edit($id): View
    {
        $userId = Auth::user()->id;
        $task = DB::table('tasks')
            ->where('id', $id)
            ->where('user_id', '=', $userId)
            ->firstOrFail();
        $priorities = DB::table('priorities')
            ->select('priorities.name', 'priorities.id')
            ->get();
        return view('tasks.edit', [
            'task' => $task,
            'priorities' => $priorities,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validator = $request->validate([
            'name' => ['nullable', 'max:50', 'min:5'],
            'description' => ['nullable', 'min:1', 'max:255'],
        ]);

        $userId = Auth::user()->id;
        $task = Task::find($request->id)
            ->where('user_id', '=', $userId)
            ->firstOrFail();

        if ($task->name != $validator['name'] && isset($validator['name'])) {
            $task->name = $validator['name'];
        }

        if (
            $task->description != $validator['description'] &&
            isset($validator['description'])
        ) {
            $task->description = $validator['description'];
        }

        if (
            $task->priority_id != $request->priority &&
            isset($request->priority)
        ) {
            $task->priority_id = $request->priority;
        }

        $task->save();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated succesfully');
    }

    public function markAsFinished($id): RedirectResponse
    {
        $userId = Auth::user()->id;
        $affected = DB::table('tasks')
            ->where('id', '=', $id)
            ->where('user_id', '=', $userId)
            ->update(['finished' => true]);

        if ($affected === 0) {
            return redirect()->route('tasks.index');
        }

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task mark as finished succesfully');
    }

    public function destroy($id): RedirectResponse
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted succesfully');
    }
}
