<x-layout>
    <div class="text-right mb-4">
        <a href="{{ route('admin.lessons.index') }}" class="text-gray-600 hover:text-gray-900">
            ← Back to Lessons
        </a>
    </div>

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Edit Lesson: {{ $lesson->title }}</h1>

    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('admin.lessons.update', $lesson) }}" method="POST" id="lesson-update-form">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Lesson Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ $lesson->title }}" required>
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                    <input type="number" name="price" id="price" step="0.01" min="0"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ $lesson->price }}" required>
                    @error('price')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="duration_minutes" class="block text-sm font-medium text-gray-700 mb-2">Duration
                        (minutes)</label>
                    <input type="number" name="duration_minutes" id="duration_minutes" min="15" max="480"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ $lesson->duration_minutes }}" required>
                    @error('duration_minutes')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
                    <input type="url" name="image" id="image"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ $lesson->image }}" placeholder="https://example.com/image.jpg">
                    @error('image')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>{{ $lesson->description }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1"
                        class="rounded border-gray-300 text-green-600 focus:ring-green-500"
                        {{ old('is_active', true) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-700">Active (available for booking)</span>
                </label>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.lessons.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                    Cancel
                </a>
                <button form="delete-form" type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg"
                    onclick="return confirm('Are you sure you want to delete this lesson')">
                    Delete Lesson
                </button>

                <button type="submit" form="lesson-update-form"
                    class="px-4 py-2 bg-green text-white rounded-lg hover:bg-green-700 transition duration-200">
                    Update Lesson
                </button>
            </div>
        </form>
    </div>
    <form action="{{ route('admin.lessons.delete', $lesson) }}" method="POST" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
