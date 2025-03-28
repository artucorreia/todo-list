@extends('layouts.main')

@section('title', 'Task')

@section('content')

<link rel="stylesheet" href="/css/tasks/task.css">

<!-- Animations -->
<link rel="stylesheet" href="/css/animations/animation.css">

<main class="container">
    @if ($task->finished)
    <h1 class="title">Completed Task</h1>
    @else
    <h1 class="title">Pending Task</h1>
    @endif

    <div class="card">
        <div class="card-body pulse">
            <div class="card-data card-title">
                <span class="label">Título:</span>
                <span class="value">{{ $task->name }}</span>
            </div>
            @if (strlen($task->description) != 0)
            <div class="card-data card-description">
                <span class="label">Descrição:</span>
                <p class="value">{{ $task->description }}</p>
            </div>

            @endif
            <div class="card-data card-priority">
                <span class="label">Prioridade:</span>
                <span class="value">{{ $task->priorityName }}</span>
            </div>
            <div class="card-dates">
                <div class="date">
                    <span class="label">Criada em:</span> {{ date("G:i:s d/m/Y", strtotime($task->created_at)) }}
                </div>
                <div class="date">
                    <span class="label">Atualizada em:</span> {{ date("G:i:s d/m/Y", strtotime($task->updated_at)) }}
                </div>
            </div>
        </div>

        <div class="btn_container">
            @if (!$task->finished)
            <form action="{{ route('finish', $task->id) }}" method="post">
                @csrf    
                @method('PUT')
                <button type="submit" class="btn btn_finish">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                </button>
            </form>
            @endif
            @if (!$task->finished)
            <form action="{{ route('editPage', $task->id) }}">
                <button class="btn btn_update">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                </button>
            </form>
            @endif
            <form action="{{ route('destroy', $task->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn_delete">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                </button>
            </form>

        </div>
    </div>
</main>
@endsection