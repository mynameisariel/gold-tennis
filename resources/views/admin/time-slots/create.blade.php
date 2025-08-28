<x-layout>
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold">Add Time Slots</h1>
                <p class="text-gray-600 mt-2">Add available time slots for {{ $lesson->title }}</p>
            </div>
            <a href="{{ route('admin.lessons.time-slots', $lesson) }}" 
               class="text-gray-600 hover:text-gray-900">
                ← Back to Time Slots
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{ route('admin.time-slots.store', $lesson) }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <input type="date" name="date" id="date" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ old('date', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}" required>
                        @error('date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-700 mb-2">Start Time</label>
                        <input type="time" name="start_time" id="start_time"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ old('start_time', '09:00') }}" required>
                        @error('start_time')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_time" class="block text-sm font-medium text-gray-700 mb-2">End Time</label>
                        <input type="time" name="end_time" id="end_time"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ old('end_time', '10:00') }}" required>
                        @error('end_time')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Recurring Options</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_recurring" value="1" id="is_recurring"
                                       class="rounded border-gray-300 text-green-600 focus:ring-green-500"
                                       {{ old('is_recurring') ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700">Make this a recurring time slot</span>
                            </label>
                            
                            <div id="recurring_options" class="ml-6 {{ old('is_recurring') ? '' : 'hidden' }}">
                                <select name="recurring_pattern" id="recurring_pattern"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                    <option value="weekly" {{ old('recurring_pattern') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                    <option value="monthly" {{ old('recurring_pattern') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                </select>
                                <p class="text-xs text-gray-500 mt-1">This will create time slots for the next 3 months</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.lessons.time-slots', $lesson) }}" 
                       class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-green text-white rounded-lg hover:bg-green-700 transition duration-200">
                        Create Time Slots
                    </button>
                </div>
            </form>
        </div>

        <!-- Quick Add Multiple Slots -->
        <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Quick Add Multiple Slots</h3>
            <p class="text-gray-600 mb-4">Quickly add multiple time slots for common patterns</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <button onclick="quickAdd('weekdays')" 
                        class="p-4 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
                    <h4 class="font-medium">Weekdays (Mon-Fri)</h4>
                    <p class="text-sm text-gray-600">9:00 AM - 10:00 AM</p>
                </button>
                
                <button onclick="quickAdd('weekends')" 
                        class="p-4 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
                    <h4 class="font-medium">Weekends (Sat-Sun)</h4>
                    <p class="text-sm text-gray-600">10:00 AM - 11:00 AM</p>
                </button>
                
                <button onclick="quickAdd('evenings')" 
                        class="p-4 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
                    <h4 class="font-medium">Evenings (Mon-Fri)</h4>
                    <p class="text-sm text-gray-600">6:00 PM - 7:00 PM</p>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('is_recurring').addEventListener('change', function() {
            const options = document.getElementById('recurring_options');
            options.classList.toggle('hidden', !this.checked);
        });

        function quickAdd(type) {
            const today = new Date();
            const nextMonday = new Date(today);
            nextMonday.setDate(today.getDate() + (8 - today.getDay()) % 7);
            
            document.getElementById('date').value = nextMonday.toISOString().split('T')[0];
            document.getElementById('is_recurring').checked = true;
            document.getElementById('recurring_options').classList.remove('hidden');
            
            switch(type) {
                case 'weekdays':
                    document.getElementById('start_time').value = '09:00';
                    document.getElementById('end_time').value = '10:00';
                    document.getElementById('recurring_pattern').value = 'weekly';
                    break;
                case 'weekends':
                    document.getElementById('start_time').value = '10:00';
                    document.getElementById('end_time').value = '11:00';
                    document.getElementById('recurring_pattern').value = 'weekly';
                    break;
                case 'evenings':
                    document.getElementById('start_time').value = '18:00';
                    document.getElementById('end_time').value = '19:00';
                    document.getElementById('recurring_pattern').value = 'weekly';
                    break;
            }
        }
    </script>
</x-layout> 