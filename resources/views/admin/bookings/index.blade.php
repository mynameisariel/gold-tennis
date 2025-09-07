<x-layout>
    <div class="w-full">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Manage Bookings</h1>
            <a href="{{ route('admin.dashboard') }}" 
               class="text-gray-600 hover:text-gray-900">
                ← Back to Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">All Bookings</h3>
            </div>
            
            @if($bookings->count() > 0)
                <div class="overflow-x-auto -mx-4 sm:-mx-6 lg:-mx-8">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Customer
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Lesson
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date & Time
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Booked On
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($bookings as $booking)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $booking->user->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $booking->user->email }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $booking->timeSlot->lesson->title }}</div>
                                            <div class="text-sm text-gray-500">${{ number_format($booking->timeSlot->lesson->price, 2) }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $booking->timeSlot->date->format('M j, Y') }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $booking->timeSlot->start_time->format('g:i A') }} - {{ $booking->timeSlot->end_time->format('g:i A') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($booking->status === 'confirmed')
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Confirmed
                                            </span>
                                        @elseif($booking->status === 'pending')
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        @else
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                Cancelled
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $booking->created_at->format('M j, Y g:i A') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            @if($booking->status === 'pending')
                                                <form action="{{ route('admin.bookings.confirm', $booking) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-green-600 hover:text-green-900">
                                                        Confirm
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            @if($booking->status !== 'cancelled')
                                                <form action="{{ route('admin.bookings.cancel', $booking) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-red-600 hover:text-red-900" 
                                                            onclick="return confirm('Are you sure you want to cancel this booking?')">
                                                        Cancel
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            @if($booking->notes)
                                                <button onclick="showNotes('{{ $booking->notes }}')" 
                                                        class="text-blue-600 hover:text-blue-900">
                                                    Notes
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $bookings->links() }}
                </div>
            @else
                <div class="px-6 py-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No bookings</h3>
                    <p class="mt-1 text-sm text-gray-500">No bookings have been made yet.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Notes Modal -->
    <div id="notesModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Booking Notes</h3>
                <p id="notesContent" class="text-gray-700"></p>
                <div class="mt-6">
                    <button onclick="closeNotes()" 
                            class="w-full px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-200">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showNotes(notes) {
            document.getElementById('notesContent').textContent = notes;
            document.getElementById('notesModal').classList.remove('hidden');
        }

        function closeNotes() {
            document.getElementById('notesModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('notesModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeNotes();
            }
        });
    </script>
</x-layout> 