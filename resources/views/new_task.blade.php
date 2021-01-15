@extends('base')
@section('title', __('tasks.create_task'))
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

    <form method="post" action="{{ route('store_task') }}">
        @csrf
        <div class="form-group">
            <label>{{ __('tasks.create_username') }}</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>{{ __('tasks.create_email') }}</label>
            <input name="email" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>{{ __('tasks.create_description') }}</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">{{ __('tasks.submit') }}</button>
    </form>
@endsection
