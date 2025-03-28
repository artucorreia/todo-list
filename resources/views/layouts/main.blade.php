<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <!-- App style -->
    <link rel="stylesheet" href="/css/main.css">

    <!-- Animations -->
    <link rel="stylesheet" href="/css/animations/animation.css">

</head>
<body>
    <header class="header_container">
        <div class="logo_container">
            <img src="/assets/logo.jpg" alt="governo de alagoas" class="logo_image">
            <a href="/tasks" target="_self" class="logo">
                Tasks AL
            </a>
        </div>
        <div class="options_container">
            <a href="{{ route('index') }}" target="_self" class="page_link">home</a>
            <a href="{{ route('createPage') }}" target="_self" class="page_link">create</a>
        </div>
    </header>
    <main>
        @if (session("success"))
            <div class="success fadeInRight">
                <i class="msg_icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#15bf3fc9"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                </i>
                <span class="success_text">
                    {{ session('success') }}
                </span>
            </div>
        @endif
        @if (session("error"))
            <div class="error fadeInRight">
                <i class="msg_icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#BB271A"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                </i>
                <span class="error_text">
                    {{ session('error') }}
                </span>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="footer_container">
        <section class="upper_container">
            <div class="about_container">
                <h2 class="footer_title">arthur correia</h2>
                <div>
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae suscipit libero delectus pariatur id sunt itaque architecto ea sit aliquam, commodi voluptas ad qui dolorum dolore, harum obcaecati iste. Dolores.
                </div>
            </div>
            <div class="social_container">
                <h2 class="footer_title">social</h2>
                <div class="social_links_container">
                    <div class="social_link">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#fff"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80ZM160-480h320v-320q-134 0-227 93t-93 227Z"/></svg>
                    </div>
                    <div class="social_link">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#fff"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80ZM253-707l227 227v-320q-64 0-123 24t-104 69Z"/></svg>
                    </div>
                    <div class="social_link">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#fff"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80ZM160-480h320v-320q-134 0-227 93t-93 227Z"/></svg>
                    </div>
                </div>
            </div>
        </section>
        <div class="divider"></div>
        <section class="lower_container">
            <span>
                &copy; Copyright {{ date("Y") }}. Made by <a href="https://github.com/artucorreia" target="_blank" class="link">arthur correia</a>
            </span>    
        </section>
    </footer>
</body>
</html>