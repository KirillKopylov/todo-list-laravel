<?php


namespace App\Services;

use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;

class TaskService
{
    public function getAllTasks(): LengthAwarePaginator
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
        } catch (QueryException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function editTask(int $id, array $attributes)
    {
        $task = Task::findOrFail($id);
        $attributes['is_edited'] = true;
        if (isset($attributes['is_completed'])) {
            $attributes['is_completed'] = true;
        } else {
            $attributes['is_completed'] = false;
        }
        try {
            $task->update($attributes);
            return redirect(route('task_by_id', ['id' => $id]));
        } catch (QueryException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
