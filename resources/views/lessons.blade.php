<x-layout>
    <div class="max-w-6xl mx-auto">
        <x-heading>Tennis Lessons</x-heading>
        
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
                           class="block w-full bg-green text-white text-center py-2 px-4 rounded-lg hover:bg-green-700 transition duration-200">
                            Book Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>