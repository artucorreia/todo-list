@extends('layouts.main')

@section('title', 'Create Task')

@section('content')

<link rel="stylesheet" href="/css/create.css">


<main class="main_container">
    <h1 class="title">Create New Task</h1>
    <div class="container">    
    <form action="/store" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="Task Name">
            </div>
    
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Task Description">{{ old('description') }}</textarea>
            </div>
    
            <div class="form-group">
                <label for="priority">Priority</label>
                <select name="priority" id="priority" class="form-control" required>
                    <option value="" disabled selected>Select priority</option>
                    @foreach ($priorities as $priority)
                    <option value="{{ $priority }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
</main>
@endsection