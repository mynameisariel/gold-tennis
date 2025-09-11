<x-layout>
    <body class="font-sans bg-page text-green flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-7xl mx-auto">
            <main class="flex justify-center">
                <div class="flex flex-col lg:flex-row gap-8 lg:gap-20 border border-green p-6 lg:p-10 w-full max-w-6xl">
                    <div class="flex flex-col flex-1">
                        <!-- title -->
                        <div class="flex flex-col justify-between">
                            <h1 class="font-bold text-4xl sm:text-6xl lg:text-8xl mb-5">Gold Tennis <br>Academy</h1>
                            <h3 class="text-lg sm:text-xl lg:text-2xl text-green">Train bold. Play <span class="text-gold font-bold">gold.</span></h3>
                        </div>
                        <!-- button --> 
                        <div class="mt-auto">
                            <a href="/contact" class="block bg-gold text-2xl sm:text-3xl lg:text-5xl font-bold rounded-lg p-3 lg:p-4 hover:bg-green hover:text-white transition duration-200 text-wrap">
                                <p class="mb-2 text-wrap">SUBSCRIBE TO OUR NEWSLETTER</p>
                            </a>
                        </div>
                    </div>
                    <div class="w-full lg:w-[450px] h-[400px] lg:h-[450px] overflow-hidden flex-shrink-0">
                        <img class="w-full h-full object-cover" src="home-image.jpg" alt="">
                    </div>
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</x-layout>