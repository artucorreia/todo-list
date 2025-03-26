@extends('layouts.main')

@section('title', 'Tasks')

@section('content')

<link rel="stylesheet" href="/css/all-tasks.css">

<main class="main_container">
    <h1 class="title">My Tasks</h1>
    @if (count($data) != 0)
    <div class="container">
        <table class="table">
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
                @foreach ($data as $task)
                <tr onclick="window.location='{{ route('findTask', ['id' => $task->id]) }}'" >
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