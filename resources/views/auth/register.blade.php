@extends('layouts.guest')

@section('title', 'Register')

@section('content')

    <div class="flex flex-col items-center justify-center min-h-180 bg-gray-100 px-4 max-md:px-0">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Register</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 w-120 max-md:w-full max-md:bg-transparent max-md:shadow-none">
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                @method('POST')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required autofocus value="{{ old('name') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md text-lg font-semibold hover:bg-blue-500 transition hover:cursor-pointer">Register</button>
            </form>
        </div>
    </div>
@endsection
