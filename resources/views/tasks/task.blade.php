@extends('layouts.main')
<link rel="stylesheet" href="/css/home.css">


@section('title', 'Task')

@section('content')
<main class="main_container">
    {{ $task }}
</main>
@endsection