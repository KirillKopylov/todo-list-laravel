<?php

namespace App\Http\Controllers;

use App\Services\TaskService;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getAllTasks()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks', ['tasks' => $tasks]);
    }
}
