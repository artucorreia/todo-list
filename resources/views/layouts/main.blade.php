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
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <header class="header_container">
        <div class="logo_container">
            <img src="/assets/logo.jpg" alt="governo de alagoas" class="logo_image">
            <a href="/" target="_self" class="logo">
                Tasks AL
            </a>
        </div>
        <div class="options_container">
            <a href="/home" target="_self" class="page_link">home</a>
            <a href="/create" target="_self" class="page_link">create</a>
        </div>
    </header>

    @yield('content')

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