@extends('base')
@section('title', __('tasks.task_list'))
@section('body')
    <h2>{{ __('tasks.task_list') }}</h2>
    {{ $tasks->links() }}
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="text-center">@sortablelink('name', __('tasks.title'))</th>
                <th class="text-center">@sortablelink('email', __('tasks.email'))</th>
                <th class="text-center">{{ __('tasks.description') }}</th>
                <th class="text-center">@sortablelink('is_completed', __('tasks.is_completed'))</th>
                @if(Auth::check())
                    <th class="text-center">{{ __('tasks.edit_task') }}</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td><a href="{{ route('task_by_id', ['id' => $task->id]) }}">{{ $task->name }}</a>
                        @if($task->is_edited)<p><em>{{ __('tasks.edited_by_admin') }}</em></p>@endif
                    </td>
                    <td>{{ $task->email }}</td>
                    <td>{{ Str::limit($task->description, 100, '...') }}</td>
                    <td>{{ $task->is_completed ? '+' : '-' }}</td>
                    @if(Auth::check())
                        <td>
                            <a href="{{ route('edit_task_by_id', ['id' => $task->id]) }}">{{ __('tasks.edit_task') }}</a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
