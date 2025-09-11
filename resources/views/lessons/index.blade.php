<x-layout>
    <div class="bg-gray-50 py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 tracking-tight">
                    Our Lessons
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg sm:text-xl text-gray-500">
                    Choose from a variety of lessons tailored to your skill level.
                </p>
            </div>

            @if($lessons->isNotEmpty())
                <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($lessons as $lesson)
                        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            <div class="flex-shrink-0">
                                <img class="h-48 w-full object-cover" src="{{ $lesson->image ?? 'https://placehold.co/600x400/F2A22E/FFFFFF?text=Gold+Tennis' }}" alt="{{ $lesson->title }}">
                            </div>
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-green">
                                        {{ $lesson->duration_minutes }} minutes
                                    </p>
                                    <a href="{{ route('lessons.show', $lesson) }}" class="block mt-2">
                                        <p class="text-xl font-semibold text-gray-900">{{ $lesson->title }}</p>
                                        <p class="mt-3 text-base text-gray-500">{{ Str::limit($lesson->description, 100) }}</p>
                                    </a>
                                </div>
                                <div class="mt-6 flex items-center justify-between">
                                    <p class="text-2xl font-bold text-gray-900">${{ number_format($lesson->price, 2) }}</p>
                                    <a href="{{ route('lessons.show', $lesson) }}" class="bg-gold text-white font-bold rounded-lg px-4 py-2 hover:bg-green transition duration-200">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="mt-12 text-center">
                    <p class="text-lg text-gray-500">No lessons are available at the moment. Please check back later.</p>
                </div>
            @endif
        </div>
    </div>
</x-layout>