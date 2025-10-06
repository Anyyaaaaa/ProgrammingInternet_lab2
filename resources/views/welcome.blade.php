<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EventPlatform — Знайди свою подію</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gradient-to-br from-blue-50 via-white to-indigo-100 text-gray-800 min-h-screen flex flex-col">

<header class="bg-white backdrop-blur-md shadow-sm fixed w-full top-0 left-0 z-50 border-b border-gray-100">
    <nav class="max-w-7xl mx-auto px-6 lg:px-8 py-4 flex justify-between items-center">
        <a href="/" class="flex items-center space-x-2 group">
            <x-application-logo class="block h-9 w-auto text-blue-600 group-hover:scale-110 transition-transform" />
            <span class="font-extrabold text-2xl text-gray-900 group-hover:text-blue-600 transition-colors">EventPlatform</span>
        </a>
        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-4 py-2 text-sm font-semibold rounded-md text-blue-600 hover:bg-blue-50 transition">
                    Головна
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition">Увійти</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 transition">
                        Зареєструватися
                    </a>
                @endif
            @endauth
        </div>
    </nav>
</header>

<main class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center z-0"
         style="background-image: url('{{ asset('image/event-bg.jpg') }}');">
    </div>
    <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
    <section class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-16 items-center text-white">

        <div class="text-center md:text-left">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight">
                Відкрийте світ <span class="text-blue-400">неймовірних подій</span>
            </h1>
            <p class="mt-4 text-lg text-gray-200">
                Наша платформа — це місце, де організатори зустрічаються зі своєю аудиторією.
                Знайдіть, що вам до душі, або анонсуйте власний івент.
            </p>
            @guest
                <div class="mt-8">
                    <a href="{{ route('register') }}"
                       class="inline-block px-8 py-3 text-lg font-semibold text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700 transition-transform transform hover:scale-105">
                        Почати зараз
                    </a>
                </div>
            @endguest
        </div>
        <div class="hidden md:block">
        </div>
    </section>
</main>
</body>
</html>
