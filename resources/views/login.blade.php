@extends('base')
@section('title', __('tasks.login'))
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
    <form method="post" action="{{ route('handle_login') }}">
        @csrf
        <div class="form-group">
            <label>{{ __('tasks.login') }}</label>
            <input type="text" name="login" class="form-control" >
        </div>
        <div class="form-group">
            <label>{{ __('tasks.password') }}</label>
            <input type="password" name="password" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">{{ __('tasks.submit') }}</button>
    </form>
@endsection
