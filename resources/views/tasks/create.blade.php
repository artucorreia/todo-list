@extends('layouts.main')

@section('title', 'Create Task')

@section('content')

<!-- Animations -->
<link rel="stylesheet" href="/css/animations/animation.css">

<div class="bg-[url(../../../public/assets/background.png)] py-15 flex flex-col justify-center items-center">
    <h1 class="text-3xl font-semibold font-[Roboto_Mono] pb-3">Create New Task</h1>
    <div class="bg-white pulse p-10 w-120 rounded-lg drop-shadow-xl">    
        <form action="{{ route('tasks.store') }}" method="post" class="flex flex-col text-lg">
            @csrf
            <div class="flex flex-col pb-5">
                <label for="name" class="font-semibold text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="bg-gray-100 rounded-md outline-none px-2 py-3 border-l-4 border-l-blue-600" required placeholder="Task Name" maxlength="50" value="{{ old('name') }}">
            </div>
    
            <div class="flex flex-col pb-5">
                <label for="description" class="font-semibold text-gray-700">Description</label>
                <textarea name="description" id="description" class="bg-gray-100 rounded-md resize-none outline-none h-60 px-2 py-3 border-l-4 border-l-blue-600" placeholder="Task Description" maxlength="255">{{ old('description') }}</textarea>
            </div>
    
            <div class="flex flex-col pb-5">
                <label for="priority" class="font-semibold text-gray-700">Priority</label>
                <select name="priority" id="priority" class="bg-gray-100 rounded-md px-2 py-3 outline-none border-l-4 border-l-blue-600" required>
                    <option value="" disabled selected>Select priority</option>
                    @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <button 
                type="submit" 
                class="
                    bg-emerald-600 
                    hover:bg-emerald-500 
                    hover:cursor-pointer 
                    rounded-md 
                    py-3 
                    text-white 
                    drop-shadow-xl
                    duration-300">
                    create
            </button>
        </form>
    </div>
</div>
@endsection