@extends('base')
@section('title', __('tasks.task_list'))
@section('body')
    <h2>{{ __('tasks.task_list') }}</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="text-center">{{ __('tasks.title') }}</th>
                <th class="text-center">{{ __('tasks.email') }}</th>
                <th class="text-center">{{ __('tasks.is_completed') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->name }}@if($task->is_edited)<p><em>{{ __('tasks.edited_by_admin') }}</em></p>@endif
                    </td>
                    <td>{{ $task->email }}</td>
                    <td>{{ $task->is_completed ? '+' : '-' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tasks->links() }}
    </div>
@endsection
