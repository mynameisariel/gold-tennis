<x-layout>
    <div class="max-w-6xl mx-auto">
        <x-heading>Tennis Lessons</x-heading>

        <div class="flex justify-center mb-4">
            <a href="{{ route('lesson-packages.index') }}" class="w-full bg-green text-white p-4 text-lg font-bold text-center rounded-md hover:bg-black transition duration-200">Save up to 30% by purchasing a LESSON PACKAGE</a>
        </div>
        
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($lessons as $lesson)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ $lesson->image }}" alt="{{ $lesson->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">{{ $lesson->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ $lesson->description }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $lesson->duration_minutes }} minutes</span>
                            <span class="text-lg font-bold text-green">${{ number_format($lesson->price, 2) }}</span>
                        </div>
                        <a href="{{ route('lessons.show', $lesson) }}" 
                           class="block w-full bg-green text-white text-center py-2 px-4 rounded-lg hover:bg-black transition duration-200">
                            Book Now
                        </a>
                        {{-- <x-dashboard-button href="{{ route('lessons.show', $lesson) }}" class="w-full">Book Now</x-dashboard-button> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>