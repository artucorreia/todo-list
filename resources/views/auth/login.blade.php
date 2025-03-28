@extends('layouts.main')

@section('title', 'Register')

@section('content')
<link rel="stylesheet" href="/css/auth/login.css">

<main class="main_container">
    <h1 class="title">Login</h1>
    <div class="card">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @method('POST')
            <div class="field_container">
                <label for="email">email</label>
                <input type="email" id="email" name="email" required value="{{ old('name') }}">
            </div>
            
            <div class="field_container">
                <label for="password">password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">login</button>
        </form>
    </div>
</main>
@endsection