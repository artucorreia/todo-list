@extends('layouts.main')

@section('title', 'Create Task')

@section('content')

<link rel="stylesheet" href="/css/tasks/create.css">

<!-- Animations -->
<link rel="stylesheet" href="/css/animations/animation.css">



<main class="main_container">
    <h1 class="title">Create New Task</h1>
    <div class="container pulse">    
        <form action="{{ route('tasks.store') }}" method="post" class="form">
            @csrf
            <div class="form-group">
                <label for="name" class="label">Name</label>
                <input type="text" name="name" id="name" class="form_name" required placeholder="Task Name" maxlength="50" value="{{ old('name') }}">
            </div>
    
            <div class="form-group">
                <label for="description" class="label">Description</label>
                <textarea name="description" id="description" class="form_description" placeholder="Task Description" maxlength="255">{{ old('description') }}</textarea>
            </div>
    
            <div class="form-group">
                <label for="priority" class="label">Priority</label>
                <select name="priority" id="priority" class="form_priority" required>
                    <option value="" disabled selected>Select priority</option>
                    @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
</main>
@endsection