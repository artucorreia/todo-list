@extends('layouts.main')

@section('title', 'Update Task')


@section('content')

<link rel="stylesheet" href="/css/tasks/edit.css">

<!-- Animations -->
<link rel="stylesheet" href="/css/animations/animation.css">

<main class="main_container">
    <h1 class="title">Edit Your Task</h1>
    <div class="container pulse">    
        <form action="{{ route('tasks.update', $task->id) }}" method="post" class="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="label">Name</label>
                <input type="text" name="name" id="name" class="form_name" required placeholder="Task Name" maxlength="50" value="{{ $task->name }}">
            </div>
    
            <div class="form-group">
                <label for="description" class="label">Description</label>
                <textarea name="description" id="description" class="form_description" placeholder="Task Description" maxlength="255">{{ $task->description }}</textarea>
            </div>
    
            <div class="form-group">
                <label for="priority" class="label">Priority</label>
                <select name="priority" id="priority" class="form_priority" required>
                    @foreach ($priorities as $priority)
                        @if ($task->priority_id == $priority->id)
                        <option value="{{ $priority->id }}" disabled selected>{{ $priority->name }}</option>
                        @else
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Edit Task</button>
        </form>
    </div>
</main>

@endsection