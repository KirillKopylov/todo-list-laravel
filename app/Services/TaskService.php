<?php


namespace App\Services;


use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskService
{
    public function getAllTasks(): LengthAwarePaginator
    {
        return Task::paginate(3);
    }

    public function getTask(int $id): Task
    {
        return Task::findOrFail($id);
    }
}
