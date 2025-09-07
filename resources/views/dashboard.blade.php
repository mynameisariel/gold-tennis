<x-layout>
    <div class="">
        <main class="" style="min-height: 450px">
            <div class="flex flex-col lg:flex-row lg:space-x-20 border border-green p-4 md:p-10">
                <div class="flex flex-col mb-8 lg:mb-0">
                    <!-- title -->
                    <div class="flex flex-col justify-between">
                        <h1 class="font-bold text-5xl md:text-6xl lg:text-8xl mb-5">Book a Lesson</h1>
                        <h3 class="text-xl md:text-2xl text-green">Welcome back, <span class="text-gold">{{ Auth::user()->name }}.</span></h3>
                    </div>
                    <!-- content --> 
                    <div class="mt-auto">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <div class="">
                                <a href="/bookings">
                                    <div class="bg-gold rounded-lg shadow-lg p-6 hover:scale-105 transition duration-200">
                                        <div class="flex items-center">
                                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-600">My Bookings</p>
                                                <p class="text-2xl font-semibold text-gray-900">{{ Auth::user()->bookings()->count() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="mt-4">
                                <a href="/lessons" class="bg-gold text-white font-bold rounded-lg p-3 hover:bg-green transition duration-200 inline-block">
                                    Book a Lesson
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://placehold.co/400" alt="" class="w-full h-auto max-w-sm lg:max-w-md mx-auto">
                </div>
            </div>
        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</x-layout>
