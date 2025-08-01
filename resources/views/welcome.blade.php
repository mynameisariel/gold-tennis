<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans bg-page text-green flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">

            

            @if (Route::has('login'))
                <nav class="flex items-center justify-between gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else

                        <div>
                            <a href="/">
                                <img src="C:\Users\Ariel\Herd\gold-tennis\public\favicon.png" alt="logo">
                            </a>
                        </div>

                        <div>
                            <x-nav-link href="/lessons">LESSONS</x-nav-link>
                            <x-nav-link href="/about">ABOUT</x-nav-link>
                            <x-nav-link href="/contact">CONTACT</x-nav-link>
                        </div>

                        <div class="">
                            {{-- <a
                                href="{{ route('login') }}"
                                class="bg-green inline-block px-5 py-1.5 text-white transition duration-500 hover:bg-black rounded-lg text-sm leading-normal"
                            >
                                Log in
                            </a> --}}

                            <x-primary-button>
                                BOOK NOW
                            </x-primary-button>
                        </div>
                        

                        @if (Route::has('register'))
                            {{-- <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a> --}}
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex space-x-20 border border-green p-10">
                <div>
                    <div class="">
                        <h1 class="font-bold text-5xl mb-5 text-green">Gold Tennis <br>Academy</h1>
                        <h3 class="text-2xl text-green">Train bold. Play <span class="text-gold">gold.</span></h3>
                    </div>
                    <div class="">
                        <a href="" class="block bg-gold text-green text-2xl font-bold rounded-lg p-4 hover:bg-green hover:text-white transition duration-200">TUESDAY KIDS GROUP <br>SESSION - REGISTER NOW</a>
                    </div>
                </div>
                <div>
                    <img src="https://placehold.co/400" alt="">
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
