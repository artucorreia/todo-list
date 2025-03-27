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
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#333"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                        </i>
                    </div>
                </div>
            </caption>
            <thead class="thead">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
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
    <div>Nothing to see here... &#128533;</div>
    @endif

</main>

@endsection