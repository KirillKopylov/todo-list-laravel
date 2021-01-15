<?php


namespace App\Services;

use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskService
{
    public function getAllTasks($column = null, $direction = null): LengthAwarePaginator
    {
        return Task::sortable()->paginate(3);
    }

    public function getTask(int $id): Task
    {
        return Task::findOrFail($id);
    }

    public function createTask($name, $email, $description)
    {
        try {
            Task::create([
                'name' => $name,
                'email' => $email,
                'description' => $description
            ]);
            return redirect(route('all_tasks'));
        } catch (\Illuminate\Database\QueryException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
