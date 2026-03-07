<x-layout>
    <div class="max-w-5xl mx-auto">
        <x-heading>Lesson Packages</x-heading>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($lessonPackages as $lessonPackage)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden my-4">
                    <img src="{{ $lessonPackage->image }}" alt="{{ $lessonPackage->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">{{ $lessonPackage->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ $lessonPackage->description }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $lessonPackage->number_of_lessons }} lessons</span>
                            <span class="text-lg font-bold text-green">${{ number_format($lessonPackage->price, 2) }}</span>
                        </div>
                        <a href="{{ route('lesson-packages.show', $lessonPackage->id) }}" 
                           class="block w-full bg-green text-white text-center py-2 px-4 rounded-lg hover:bg-black transition duration-200">
                            Purchase Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

