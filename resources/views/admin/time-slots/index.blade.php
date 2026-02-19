<x-layout>
    <div class="flex justify-between items-center mb-5">
        <a href="{{ route('admin.lessons.time-slots', $prevLesson) }}" 
            class="bg-gold px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
            ◀   Previous Lesson
        </a>
        <a href="{{ route('admin.lessons.time-slots', $nextLesson) }}" 
            class="bg-gold px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
            Next Lesson     ▶
        </a>
    </div>
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold">Time Slots for {{ $lesson->title }}</h1>
                <p class="text-gray-600 mt-2">Manage available time slots for this lesson</p>
            </div>
            <div class="justify-between items-center space-x-4">
                <a href="{{ route('admin.time-slots.create', $lesson) }}" 
                   class="bg-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                    Add Time Slots
                </a>
                <a href="{{ route('admin.lessons.index') }}" 
                   class="text-gray-600 hover:text-gray-900">
                    ← Back to Lessons
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Available Time Slots</h3>
            </div>
            
            @if($timeSlots->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Time
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Duration
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Recurring
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($timeSlots as $slot)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $slot->date->format('M j, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $slot->start_time->format('g:i A') }} - {{ $slot->end_time->format('g:i A') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $slot->start_time->diffInMinutes($slot->end_time) }} minutes
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $slot->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $slot->is_available ? 'Available' : 'Unavailable' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if($slot->is_recurring)
                                            <span class="text-blue-600">{{ ucfirst($slot->recurring_pattern) }}</span>
                                        @else
                                            <span class="text-gray-500">One-time</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            @if($slot->is_available)
                                                <form action="{{ route('admin.time-slots.toggle', $slot) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-yellow-600 hover:text-yellow-900">
                                                        Disable
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.time-slots.toggle', $slot) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-green-600 hover:text-green-900">
                                                        Enable
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.time-slots.destroy', $slot) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" 
                                                        onclick="return confirm('Are you sure you want to delete this time slot?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="px-6 py-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No time slots</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating some time slots for this lesson.</p>
                    <div class="mt-6">
                        <a href="{{ route('admin.time-slots.create', $lesson) }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green hover:bg-green-700">
                            Add Time Slots
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout> 