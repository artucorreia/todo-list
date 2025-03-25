<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function findAll(): View
    {
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
