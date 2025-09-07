<x-layout>
    <body class="font-sans bg-page text-green flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <div class="">
            <main class="" style="min-height: 450px">
                <div class="flex space-x-20 border border-green p-10">
                    <div class="flex flex-col">
                        <!-- title -->
                        <div class="flex flex-col justify-between">
                            <h1 class="font-bold text-8xl mb-5">Gold Tennis <br>Academy</h1>
                            <h3 class="text-2xl text-green">Train bold. Play <span class="text-gold font-bold">gold.</span></h3>
                        </div>
                        <!-- button --> 
                        <div class="mt-auto">
                            <a href="/contact" class="block bg-gold text-5xl font-bold rounded-lg p-4 hover:bg-green hover:text-white transition duration-200">
                                <p class="mb-2">SUBSCRIBE TO</p>
                                <p>OUR NEWSLETTER</p>
                            </a>
                        </div>
                    </div>
                    <div>
                        <img src="https://placehold.co/400" alt="">
                    </div>
                </div>
                
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</x-layout>