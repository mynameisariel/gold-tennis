<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gold Tennis Academy</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-page text-green min-h-screen">
        <header class="fixed top-0 left-0 right-0 z-50 bg-page">
            <div class="flex justify-center p-6 lg:p-8">
                <div class="w-full lg:max-w-4xl max-w-[335px] text-sm">
                    @if (Route::has('login'))
                        <nav class="flex items-center justify-between gap-4">
                            <div>
                                <a href="/">
                                    <img class="w-10 h-10 hover:scale-150 transition-all duration-300 ease-in-out" src="/favicon.png" alt="logo">
                                </a>
                            </div>

                            <div>
                                <x-nav-link href="/lessons" :active="request()->is('lessons')">LESSONS</x-nav-link>
                                <x-nav-link href="/about" :active="request()->is('about')">ABOUT</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">CONTACT</x-nav-link>
                            </div>

                            <div class="flex items-center gap-4">
                                @auth
                                    <!-- <x-primary-button href="{{ route('dashboard') }}">
                                        DASHBOARD
                                    </x-primary-button> -->
                                    @if (Auth::user()->is_admin)
                                        <x-primary-button href="{{ route('admin.dashboard') }}">
                                            DASHBOARD
                                        </x-primary-button>
                                    
                                    @elseif (!Auth::user()->is_admin)
                                        <x-primary-button href="{{ route('dashboard') }}">
                                            DASHBOARD
                                        </x-primary-button>
                                    @endif
                                    
                                    <!-- Logout Button -->
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button type="submit" 
                                                class="text-gray-600 hover:text-red-600 transition-colors duration-200 text-sm font-medium">
                                            LOGOUT
                                        </button>
                                    </form>
                                @else
                                    <x-primary-button href="{{ route('register') }}">
                                        BOOK NOW
                                    </x-primary-button>
                                @endauth
                            </div>
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-page">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gold shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
