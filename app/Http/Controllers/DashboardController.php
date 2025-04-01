<?php

namespace App\Http\Controllers;

use App\Http\Services\TaskService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $amountOfPending = $this->taskService->findAmountOfTasksByFinished(
            false,
        );
        $amountOfFinished = $this->taskService->findAmountOfTasksByFinished(
            true,
        );
        $totalAmout = $this->taskService->findTotalAmountOfTasks();

        return view('dashboard.index', [
            'amountOfPending' => $amountOfPending,
            'amountOfFinished' => $amountOfFinished,
            'totalAmount' => $totalAmout,
        ]);
    }

    public function findTasksQuantityByPriorityChart()
    {
        return $this->taskService->findTasksQuantityByPriorityChart();
    }
}
