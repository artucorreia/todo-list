@extends('layouts.main')

@section('title', 'Task')

@section('content')

<!-- Animations -->
<link rel="stylesheet" href="/css/animations/animation.css">

<div class="flex flex-col items-center justify-center bg-[url(../../../public/assets/background.png)] py-40">
    <h1 class="text-3xl font-normal font-[Roboto_Mono] pb-3">
        {{ $task->finished ? 'Completed Task' : 'Pending Task' }}
    </h1>

    <div class="flex flex-wrap gap-4 justify-center">
        <div class="pulse max-w-170 bg-white text-gray-800 rounded-lg p-5 drop-shadow-xl">
            <div class="pb-3">
                <span class="font-semibold block">Título:</span>
                <div class="bg-gray-100 border-l-4 border-blue-500 rounded-sm px-2 py-2">
                    <span class="text-black">{{ $task->name }}</span>
                </div>
            </div>

            @if (!empty($task->description))
            <div class="pb-3">
                <span class="font-semibold block">Descrição:</span>
                <div class="bg-gray-100 border-l-4 border-blue-500 rounded-sm px-2 py-2">
                    <span class="text-black break-words whitespace-pre-wrap">{{ $task->description }}</span>
                </div>
            </div>
            @endif

            <div>
                <span class="font-semibold block">Prioridade:</span>
                <div class="bg-gray-100 border-l-4 border-blue-500 rounded-sm px-2 py-2">
                    <span class="text-black">{{ $task->priorityName }}</span>
                </div>
            </div>

            <div class="pt-6 text-sm text-gray-700">
                <div><span class="opacity-65">Created at:</span> {{ date("G:i:s d/m/Y", strtotime($task->created_at)) }}</div>
                <div><span class="opacity-65">Updated at:</span> {{ date("G:i:s d/m/Y", strtotime($task->updated_at)) }}</div>
            </div>
        </div>

        <div class="flex flex-col gap-3">
            @if (!$task->finished)
            <form action="{{ route('tasks.finish', $task->id) }}" method="post">
                @csrf    
                @method('PUT')
                <button 
                    type="submit" 
                    class="bg-emerald-400 p-2 rounded-full hover:bg-emerald-300 transition duration-300 hover:scale-105 hover:cursor-pointer">
                    <x-carbon-checkmark class="size-7" />
                </button>
            </form>

            <form action="{{ route('tasks.edit', $task->id) }}">
                <button 
                class="bg-amber-400 p-2 rounded-full hover:bg-amber-300 transition duration-300 hover:scale-105 hover:cursor-pointer">
                    <x-carbon-edit class="size-7" />
                </button>
            </form>
            @endif

            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="bg-red-700 p-2 rounded-full hover:bg-red-600 transition duration-300 hover:scale-105 hover:cursor-pointer">
                    <x-carbon-trash-can class="size-7" />
                </button>
            </form>
        </div>
    </div>
</div>
@endsection