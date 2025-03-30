<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind css -->
    @vite('resources/css/app.css')

    <title>@yield('title')</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">

</head>

<body class="font-[Roboto] text-gray-800">
    <header class="flex px-5 py-3 shadow-xl">
        <div class="flex-auto flex justify-start items-center">
            <img src="/assets/logo.jpg" alt="governo de alagoas" class="size-15 rounded-full">
            <a href="{{ route('tasks.index') }}" target="_self" class="pl-2">
                <h1 class="text-2xl font-semibold">Tasks AL</h1>
            </a>
        </div>
        <div class="flex-auto flex justify-end items-center">
            <a href="{{ route('show.login') }}" target="_self"
                class="pr-3 font-semibold uppercase hover:text-blue-600 duration-200">login</a>
            <a href="{{ route('show.register') }}" target="_self"
                class="pr-3 font-semibold uppercase hover:text-blue-600 duration-200">register</a>
        </div>
    </header>
    <main>
        <!-- Error message -->
        @if ($errors->any())
            <div
                class="
                absolute 
                right-2 
                mt-3 
                text-center 
                w-60 
                p-1 
                bg-red-400 
                opacity-70 
                border-red-600 
                border-1 
                text-red-600 
                rounded-lg
                fadeInRight
                hover:cursor-pointer">
                <x-carbon-warning class="size-6 mx-auto mb-3" />
                <span>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="px-40 py-15 bg-black text-white">
        <section class="flex justify-between">
            <div class="w-3/5">
                <h2 class="font-bold uppercase text-lg">arthur correia</h2>
                <div class="text-sm">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae suscipit libero delectus pariatur id
                    sunt itaque architecto ea sit aliquam, commodi voluptas ad qui dolorum dolore, harum obcaecati iste.
                    Dolores.
                </div>
            </div>
            <div>
                <h2 class="font-bold uppercase text-lg">social</h2>
                <div class="flex justify-between items-center">
                    <x-carbon-logo-x class="size-8 hover:cursor-pointer" />
                    <x-carbon-logo-linkedin class="size-8 hover:cursor-pointer" />
                    <x-carbon-logo-github class="size-8 hover:cursor-pointer" />
                </div>
            </div>
        </section>
        <div class="bg-white w-full h-0.5 my-5"></div>
        <section class="text-center">
            <span class="text-sm">
                &copy; Copyright {{ date('Y') }}. Made by <a href="https://github.com/artucorreia" target="_blank"
                    class="underline capitalize">arthur correia</a>
            </span>
        </section>
    </footer>
</body>

</html>
