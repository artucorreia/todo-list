@extends('layouts.main')

@section('title', 'Tasks')

@section('content')
    <div class="bg-[url(../../../public/assets/background.png)]">
        <div class="mx-auto py-20 min-h-150">
            <h1 class="text-3xl font-semibold font-[Roboto_Mono] pb-3 text-center">My Tasks</h1>
            <div class="overflow-auto max-w-400 mx-auto">

                <x-bladewind::table :data="$tasks" layout="custom" has_header="true" has_border="true"
                    message_as_empty_state="true" divider="thin" class="overflow-auto w-100">

                    <x-slot:header>
                        <thead class="sticky top-[-1px] cursor-default">
                            <th class="!text-center text-nowrap">#</th>
                            <th class="!text-center text-nowrap">Name</th>
                            <th class="!text-center text-nowrap">Priority</th>
                            <th class="!text-center text-nowrap">Created At</th>
                            <th class="!text-center text-nowrap">Updated At</th>
                            <th class="!text-center text-nowrap">Finished</th>
                            <th class="!text-center text-nowrap">Actions</th>
                        </thead>
                    </x-slot:header>

                    <tbody class="cursor-default">
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="!text-center">{{ $loop->iteration }}</td>
                                <td class="!text-center font-semibold">{{ $task->name }}</td>
                                <td class="!text-center font-semibold">{{ $task->priority_name }}</td>
                                <td class="!text-center">
                                    {{ date('G:i:s d/m/Y', strtotime($task->created_at)) }}
                                </td>
                                <td class="!text-center">
                                    {{ date('G:i:s d/m/Y', strtotime($task->updated_at)) }}
                                </td>
                                <td>
                                    @if ($task->finished)
                                        <x-carbon-checkbox-checked class="size-8 mx-auto text-black" />
                                    @else
                                        <x-carbon-checkbox class="size-8 mx-auto  text-black" />
                                    @endif
                                </td>
                                <td class="flex justify-between min-w-40">
                                    <a href="{{ route('tasks.show', $task->id) }}"
                                        class="hover:cursor-pointer p-1 bg-blue-500 rounded-full">
                                        <x-carbon-task-view class="size-5.5 text-white" />
                                    </a>
                                    @if (!$task->finished)
                                        <form action="{{ route('tasks.finish', $task->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="hover:cursor-pointer p-1 !bg-green-500 rounded-full">
                                                <x-carbon-checkmark class="size-5.5 text-white" />
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="hover:cursor-pointer p-1 !bg-red-500 rounded-full">
                                            <x-carbon-trash-can class="size-5.5 text-white" />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </x-bladewind::table>
                @if (count($tasks) === 0)
                    <div class="pt-2 flex flex-col items-center">
                        <img src="/assets/task.png" alt="task" class="size-70">
                        <div class="font-semibold text-xl pb-2">
                            You have no task...
                        </div>
                        <a href="{{ route('tasks.create') }}"
                            class="
                            !border-2 
                            !border-green-500 
                            rounded-md 
                            !text-green-500 
                            font-semibold 
                            px-5 
                            py-1 
                        ">
                            <button class="uppercase">create</button>
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>

@endsection
