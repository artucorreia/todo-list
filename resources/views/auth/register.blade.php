@extends('layouts.main')

@section('title', 'Register')

@section('content')

<link rel="stylesheet" href="/css/auth/register.css">

<main class="main_container">
    <h1 class="title">Register</h1>
    <div class="card">
        <form method="POST" action="{{ route('register') }}" class="form_container">
            @csrf
            @method('POST')

            <div class="field_container">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name') }}">
            </div>
            
            <div class="field_container">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
            </div>
            
            <div class="field_container">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="field_container">
                <label for="password_confirmation" class="form-label">confirm password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            
            <button type="submit" class="btn">register</button>
        </form>
    </div>
</main>
@endsection