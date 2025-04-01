<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function findTasksQuantityByPriorityChart()
    {
        $queryResult = DB::select(
            'SELECT COUNT(t.id) as data, p.name AS label FROM tasks t, priorities p where t.priority_id = p.id and t.user_id = ? group by p.name;',
            [Auth::user()->id],
        );

        return response()->json([
            'labels' => array_column($queryResult, 'label'),
            'data' => array_column($queryResult, 'data'),
        ]);
    }

    public function findAmountOfTasksByFinished(bool $finished = false)
    {
        $queryResult = DB::table('tasks')
            ->where('finished', '=', $finished)
            ->where('user_id', '=', Auth::user()->id)
            ->count('id');
        return $queryResult;
    }

    public function findTotalAmountOfTasks()
    {
        $queryResult = DB::table('tasks')
            ->where('user_id', '=', Auth::user()->id)
            ->count('id');
        return $queryResult;
    }
}
