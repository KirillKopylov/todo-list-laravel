@extends('base')
@section('title', __('tasks.edit_task'))
@section('body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('handle_edit_task', ['id' => $task->id]) }}">
        @csrf
        <input name="id" type="text" hidden value="{{ $task->id }}" class="form-control">
        <div class="form-group">
            <label>{{ __('tasks.create_username') }}</label>
            <input name="name" type="text" class="form-control" value="{{ $task->name }}">
        </div>
        <div class="form-group">
            <label>{{ __('tasks.create_email') }}</label>
            <input name="email" type="text" class="form-control" value="{{ $task->email }}">
        </div>
        <div class="form-group">
            <label>{{ __('tasks.create_description') }}</label>
            <textarea name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label>{{ __('tasks.is_completed') }}</label>
            <input type="checkbox"
                   name="is_completed" @if($task->is_completed) checked @endif>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">{{ __('tasks.submit') }}</button>
    </form>
@endsection
