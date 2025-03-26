<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function findAll(Request $request)
    {
        if ($request->ajax()) {
            $tasks = Task::all();  // ou qualquer lógica de consulta
            return response()->json([
                'data' => $tasks
            ]);
        }

        return view('tasks.all-tasks');
    }

    public function findById($id): View
    {
        return view('tasks.task', ['id' => $id]);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function deleteById()
    {

    }
}
