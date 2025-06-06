@extends('layouts.main')

@section('title', 'Update Task')

@section('content')
    <!-- background image -->
    <link rel="stylesheet" href="/css/background/bg.css">

    <!-- Animations -->
    <link rel="stylesheet" href="/css/animations/animation.css">

    <x-arrow-back-page route="tasks.show" :routeParam="['id' => $task->id]" title="Go back to task page" />

    <div class="py-15 flex flex-col justify-center items-center background_image">
        <h1 class="text-3xl font-semibold font-[Roboto_Mono] pb-3">Edit Your Task</h1>
        <div class="bg-white pulse p-10 w-120 rounded-lg drop-shadow-xl max-md:w-full">
            <form action="{{ route('tasks.update', $task->id) }}" method="post" class="flex flex-col text-lg">
                @csrf
                @method('PUT')
                <div class="flex flex-col pb-5">
                    <label for="name" class="font-semibold text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-100 rounded-md outline-none px-2 py-3 !border-l-4 !border-l-blue-600" required
                        placeholder="Task Name" maxlength="50" value="{{ $task->name }}">
                </div>

                <div class="flex flex-col pb-5">
                    <label for="description" class="font-semibold text-gray-700">Description</label>
                    <textarea name="description" id="description"
                        class="bg-gray-100 rounded-md !resize-none !outline-none h-60 px-2 py-3 !border-l-4 !border-l-blue-600"
                        placeholder="Task Description" maxlength="255">{{ $task->description }}</textarea>
                </div>

                <div class="flex flex-col pb-5">
                    <label for="priority" class="font-semibold text-gray-700">Priority</label>
                    <select name="priority" id="priority"
                        class="bg-gray-100 rounded-md px-2 py-3 outline-none !border-l-4 !border-l-blue-600" required>
                        @foreach ($priorities as $priority)
                            @if ($task->priority_id == $priority->id)
                                <option value="{{ $priority->id }}" selected>{{ $priority->name }}</option>
                            @else
                                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    class="
                    !bg-orange-600 
                    hover:cursor-pointer 
                    rounded-md 
                    py-3 
                    text-white 
                    !drop-shadow-xl
                    uppercase">
                    update
                </button>
            </form>
        </div>
    </div>

@endsection

