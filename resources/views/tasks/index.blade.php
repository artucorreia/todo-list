@extends('layouts.main')

@section('title', 'Tasks')

@section('content')

<link rel="stylesheet" href="/css/tasks/index.css">

<main class="main_container">
    <h1 class="title">My Tasks</h1>
    @if (count($tasks) != 0)
    <div class="container">
        <table class="table">
            <caption class="caption">
                <div class="search_container">
                    <div class="search_card">
                        <form action="{{ route('index') }}" method="get">
                            <input type="text" class="search_input" name="search" maxlength="50" value="{{ $search }}">
                        </form>
                        <i class="search_icon">
                            @if ($search)
                            <a href="{{ route('index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#333"><path d="m456-320 104-104 104 104 56-56-104-104 104-104-56-56-104 104-104-104-56 56 104 104-104 104 56 56Zm-96 160q-19 0-36-8.5T296-192L80-480l216-288q11-15 28-23.5t36-8.5h440q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H360ZM180-480l180 240h440v-480H360L180-480Zm400 0Z"/></svg>
                            </a>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#333"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                            @endif
                        </i>
                    </div>
                </div>
            </caption>
            <thead class="thead">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Priority</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Finished</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($tasks as $task)
                <tr onclick="window.location='{{ route('show', $task->id) }}'" >
                    <td class="task_id">
                        {{ $task->id }}
                    </td>
                    <td class="task_name">
                        {{ $task->name }}
                    </td>
                    <td class="task_priority">
                        {{ $task->priorityName }}
                    </td>
                    <td class="task_date">
                        @if ($task->created_at == null)
                            ---
                        @else
                        {{ date('G:i:s d/m/Y', strtotime($task->created_at)) }}
                        @endif
                    </td>
                    <td class="task_date">
                        @if (!$task->updated_at)
                            ---
                        @else
                            {{ date('G:i:s d/m/Y', strtotime($task->updated_at)) }}
                        @endif
                    </td>
                    <td class="task_finished">
                        @if ($task->finished)
                        <span>
                            &#9989;
                        </span>
                        @else
                        <span>
                            &#10060;
                        </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        @if ($search)
        <div>No task found for your search... &#128533;</div>
        <a href="{{ route('index') }}" class="btn_back_container">
            <button class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z"/></svg>
            </button>
        </a>
        @else
        <div>You have no tasks... &#128533;</div>
        <a href="{{ route('createPage') }}" class="btn_back_container">
            <button class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
            </button>
        </a>
        @endif
    @endif

</main>

@endsection