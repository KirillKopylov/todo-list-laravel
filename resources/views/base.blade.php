<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('all_tasks') }}">{{ __('tasks.task_list') }}</a>
    <a class="navbar-brand" href="{{ route('create_task') }}">{{ __('tasks.create_task') }}</a>
    @if(Auth::check())
        <a class="navbar-brand" href="{{ route('logout') }}">{{ __('tasks.logout') }}</a>
    @else
        <a class="navbar-brand" href="{{ route('login') }}">{{ __('tasks.login') }}</a>
    @endif
</nav>
<div class="container">
    <div class="text-center">
        @section('body')
        @show
    </div>
</div>
</body>
</html>
