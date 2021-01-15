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

    public function getTask(int $id)
    {
        $task = $this->taskService->getTask($id);
        return view('task', ['task' => $task]);
    }
}
