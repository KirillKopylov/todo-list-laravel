@extends('base')
@section('title', __('tasks/view.view'))
@section('body')
    <div class="card text-center">
        <div class="card text-center">
            <div class="card-header">{{ __('tasks/view.username', ['name' => $task->name ]) }}</div>
            <div class="card-header">{{ __('tasks/view.email', ['email' => $task->email]) }}</div>
            <div class="card-header">
                {{ __('tasks/view.is_completed',[ 'isCompleted' => $task->is_completed ? '+' : '-']) }}
            </div>
            <div class="card-header">
                {{ __('tasks/view.is_edited_by_admin', ['isEdited' => $task->is_edited ? '+' : '-' ]) }}
            </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">{{ $task->description }}</p>
            </div>
        </div>
    </div>
@endsection
