<x-layout>
    <div class="max-w-4xl mx-auto">
        <div class="text-right mb-4">
            <a href="{{ route('admin.lesson-packages.index') }}" 
               class="text-gray-600 hover:text-gray-900">
                ← Back to Lesson Packages
            </a>
        </div>
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Edit Lesson Package: {{ $lessonPackage->title }}</h1>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{ route('admin.lesson-packages.update', $lessonPackage) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Lesson Package Title</label>
                        <input type="text" name="title" id="title" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ $lessonPackage->title }}" required>
                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                        <input type="number" name="price" id="price" step="0.01" min="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ $lessonPackage->price }}" required>
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="number_of_lessons" class="block text-sm font-medium text-gray-700 mb-2">Number of Lessons</label>
                        <input type="number" name="number_of_lessons" id="number_of_lessons" min="2" max="50"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ $lessonPackage->number_of_lessons }}" required>
                        @error('number_of_lessons')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
                        <input type="url" name="image" id="image"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ $lessonPackage->image }}" placeholder="https://example.com/image.jpg">
                        @error('image')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                              required>{{ $lessonPackage->description }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" 
                               class="rounded border-gray-300 text-green-600 focus:ring-green-500"
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-700">Active (available for purchase)</span>
                    </label>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.lesson-packages.index') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                        Cancel
                    </a>
                    <button type="submit" form="delete-package-form" class="px-4 py-2 bg-red-600 text-white rounded-lg" onclick="return confirm('Are you sure you want to delete this lesson')">
                        Delete Lesson Package
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-green text-white rounded-lg hover:bg-green-700 transition duration-200">
                        Update Lesson Package
                    </button>
                </div>
            </form>
        </div>
    </div>
    <form action="{{ route('admin.lesson-packages.destroy', $lessonPackage) }}" method="POST" id="delete-package-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout> 