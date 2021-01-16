<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getAllTasks(Request $request)
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks', [
            'tasks' => $tasks->appends($request->except('page'))
        ]);
    }

    public function getTask(int $id)
    {
        $task = $this->taskService->getTask($id);
        return view('task', ['task' => $task]);
    }

    public function createTask()
    {
        return view('new_task');
    }

    public function storeTask(CreateTaskRequest $request)
    {
        return $this->taskService->createTask($request->name, $request->email, $request->description);
    }

    public function editTaskIndex(int $id)
    {
        $task = $this->taskService->getTask($id);
        return view('edit', ['task' => $task]);
    }

    public function editTask(int $id, EditTaskRequest $request)
    {
        return $this->taskService->editTask($id, $request->only('id', 'name', 'email',
            'description', 'is_completed'));
    }
}
