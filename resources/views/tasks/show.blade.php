@extends('layouts.main')

@section('title', 'Task')

@section('content')
    <!-- background image -->
    <link rel="stylesheet" href="/css/background/bg.css">

    <!-- Animations -->
    <link rel="stylesheet" href="/css/animations/animation.css">

    <a href="{{ route('tasks.index') }}" title="Go back to home"
        class="!bg-blue-500 size-10 absolute mt-2 !ml-2 rounded-full flex justify-center items-center hover:cursor-pointer">
        <x-carbon-arrow-left class="size-7 text-white" />
    </a>

    <div class="flex flex-col items-center py-35 background_image">
        <h1 class="text-3xl font-normal font-[Roboto_Mono] pb-3">
            {{ $task->finished ? 'Completed Task' : 'Pending Task' }}
        </h1>

        <div class="flex flex-col items-center gap-4">
            <div class="pulse !w-150 bg-white text-gray-800 rounded-lg p-5 !drop-shadow-xl">
                <div class="pb-3">
                    <span class="font-semibold block">Título:</span>
                    <div class="bg-gray-100 !border-l-4 !border-blue-500 rounded-sm px-2 py-4">
                        <span class="text-black">{{ $task->name }}</span>
                    </div>
                </div>

                @if (!empty($task->description))
                    <div class="pb-3">
                        <span class="font-semibold block">Descrição:</span>
                        <div class="bg-gray-100 !border-l-4 !border-blue-500 rounded-sm px-2 py-4">
                            <span class="text-black break-words whitespace-pre-wrap">{{ $task->description }}</span>
                        </div>
                    </div>
                @endif

                <div>
                    <span class="font-semibold block">Prioridade:</span>
                    <div class="bg-gray-100 !border-l-4 !border-blue-500 rounded-sm px-2 py-4">
                        <span class="text-black">{{ $task->priorityName }}</span>
                    </div>
                </div>

                <div class="pt-6 text-sm text-gray-700">
                    <div><span class="opacity-65">Created at:</span> {{ date('G:i:s d/m/Y', strtotime($task->created_at)) }}
                    </div>
                    <div><span class="opacity-65">Updated at:</span> {{ date('G:i:s d/m/Y', strtotime($task->updated_at)) }}
                    </div>
                </div>
            </div>

            <div class="flex justify-center gap-3">
                @if (!$task->finished)
                    <button onclick="showModal('check-modal')" class="!bg-emerald-500 p-2 rounded-full hover:cursor-pointer"
                        title="Mark the task as finished">
                        <x-carbon-checkmark class="size-7 text-white" title="Mark the task as finished" />
                    </button>

                    <form action="{{ route('tasks.edit', $task->id) }}">
                        <button class="!bg-amber-500 p-2 rounded-full hover:cursor-pointer" title="Edit the task">
                            <x-carbon-edit class="size-7 text-white" title="Edit the task" />
                        </button>
                    </form>
                @endif

                <button onclick="showModal('delete-modal')" class="!bg-red-600 p-2 rounded-full hover:cursor-pointer">
                    <x-carbon-trash-can class="size-7 text-white" title="Delete the task" />
                </button>

            </div>
        </div>
    </div>

    <!-- Modals -->
    <form action="{{ route('tasks.finish', $task->id) }}" method="post">
        @csrf
        @method('PUT')
        <x-bladewind::modal size="large" title="Check Confirmation" name="check-modal"
            ok_button_action="this.closest('form').submit()">
            Do you really want mark your task as finished?
        </x-bladewind::modal>
    </form>

    <form action="{{ route('tasks.destroy', $task->id) }}" method="post" title="Delete the task">
        @csrf
        @method('DELETE')
        <x-bladewind::modal size="large" title="Delete Confirmation" name="delete-modal"
            ok_button_action="this.closest('form').submit()">
            Do you really want to delete your task?
        </x-bladewind::modal>
    </form>

@endsection

