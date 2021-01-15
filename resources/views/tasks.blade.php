@extends('base')
@section('title', __('tasks/general.task_list'))
@section('body')
    <h2>{{ __('tasks/general.task_list') }}</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="text-center">{{ __('tasks/list.title') }}</th>
                <th class="text-center">{{ __('tasks/list.email') }}</th>
                <th class="text-center">{{ __('tasks/list.description') }}</th>
                <th class="text-center">{{ __('tasks/list.is_completed') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td><a href="{{ route('task_by_id', ['id' => $task->id]) }}">{{ $task->name }}</a>
                        @if($task->is_edited)<p><em>{{ __('tasks/general.edited_by_admin') }}</em></p>@endif
                    </td>
                    <td>{{ $task->email }}</td>
                    <td>{{ Str::limit($task->description, 100, '...') }}</td>
                    <td>{{ $task->is_completed ? '+' : '-' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tasks->links() }}
    </div>
@endsection
