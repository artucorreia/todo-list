@extends('layouts.guest')

@section('title', 'Login')

@section('content')

<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 px-4">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Login</h1>
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md">
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            @method('POST')

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
            
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md text-lg font-semibold hover:bg-blue-500 transition hover:cursor-pointer">Login</button>
        </form>
    </div>
</div>
@endsection
