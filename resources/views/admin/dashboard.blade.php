<x-layout>
    <div class="max-w-7xl mx-auto border border-green p-10">
        <h1 class="font-bold text-8xl mb-10">Admin Dashboard</h1>
        <!-- welcome message -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold">Welcome back, <span class="text-gold">{{ Auth::user()->name }}.</span></h2>
        </div>

        <!-- preview of bookings and lessons -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Lessons</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalLessons }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Bookings</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalBookings }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Pending Bookings</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $pendingBookings }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Today's Bookings</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $todayBookings }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Manage & Packages</h3>
                <p class="text-gray-600 mb-4">Create and manage tennis lesson types, packages, and pricing.</p>
                <div class="flex justify-left space-x-4">
                    <a href="{{ route('admin.lessons.index') }}" 
                    class="inline-block bg-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        View Lessons
                    </a>
                    <a href="{{ route('admin.lesson-packages.index') }}" 
                    class="inline-block bg-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        View Packages
                    </a>
                </div>
                
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Manage Bookings & User Packages</h3>
                <p class="text-gray-600 mb-4">View and manage all customer bookings and package purchases.</p>
                <div class="flex justify-left space-x-2">
                    <a href="{{ route('admin.bookings.index') }}" 
                    class="inline-block bg-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        View Bookings
                    </a>
                    <a href="{{ route('admin.packages.index') }}" 
                        class="inline-block bg-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        View User Packages
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Add Time Slots</h3>
                <p class="text-gray-600 mb-4">Add available time slots for lessons and manage scheduling.</p>
                <a href="{{ route('admin.time-slots.index') }}" 
                   class="inline-block bg-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                    Manage Slots
                </a>
            </div>
        </div>
    </div>
</x-layout> 