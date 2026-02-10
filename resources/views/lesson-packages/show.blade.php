<x-layout>
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div class="text-gray-600">{{ $lessonPackage->title }}</div>
            <button class="bg-gray-200 px-4 py-2 rounded-lg flex items-center gap-2">
                Review
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- lessonPackage details -->
            <div>
                <h1 class="text-3xl font-bold text-green mb-4">{{ $lessonPackage->title }}</h1>
                <img src="{{ $lessonPackage->image }}" alt="{{ $lessonPackage->title }}" class="w-full h-64 object-cover rounded-lg mb-4">
                <p class="text-gray-700">{{ $lessonPackage->description }}</p>
            </div>

            <!-- Right Column - Booking Interface -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Repeat Option -->
                {{-- <div class="mb-6">
                    <label class="flex items-center gap-2 mb-2">
                        <input type="checkbox" id="repeat" class="rounded">
                        <span>Repeat</span>
                    </label>
                    <input type="text" placeholder="Enter repeat pattern..." class="w-full px-3 py-2 border rounded-lg" disabled>
                </div> --}}

                <!-- Time Slots -->
                {{-- <div>
                    <h4 class="font-semibold mb-3">Available Time Slots</h4>
                    <div id="timeSlots" class="space-y-2">
                        @foreach($timeSlots as $slot)
                            <button class="w-full bg-green text-white py-3 px-4 rounded-lg hover:bg-green-700 transition duration-200"
                                    data-slot-id="{{ $slot->id }}">
                                {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                            </button>
                        @endforeach
                        
                        @if($timeSlots->isEmpty())
                            <p class="text-gray-500 text-center py-4">No available time slots for this date.</p>
                        @endif
                    </div>
                </div> --}}

                <!-- Booking Form -->
                <form id="bookingForm" action="{{ route('lesson-packages.purchase', $lessonPackage) }}" method="POST" class="mt-6">
                    @csrf
                    <textarea name="notes" placeholder="Additional notes (optional)" 
                              class="w-full px-3 py-2 border rounded-lg mb-4" rows="3"></textarea>
                    <button type="submit" 
                            class="w-full bg-green text-white py-3 px-4 rounded-lg hover:bg-green-700 transition duration-200 disabled:opacity-50"
                            >
                        Confirm Package Purchase
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- <script>
        let currentDate = new Date('{{ $selectedDate }}');
        let selectedDate = new Date('{{ $selectedDate }}');
        let selectedTimeSlot = null;

        function renderCalendar() {
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"];
            
            document.getElementById('currentMonth').textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
            
            const grid = document.getElementById('calendarGrid');
            grid.innerHTML = '';
            
            const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
            const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
            const startDate = new Date(firstDay);
            startDate.setDate(startDate.getDate() - firstDay.getDay() + 1);
            
            for (let i = 0; i < 42; i++) {
                const date = new Date(startDate);
                date.setDate(startDate.getDate() + i);
                
                const dayElement = document.createElement('div');
                dayElement.className = 'text-center py-2 border border-gray-200 cursor-pointer hover:bg-gray-50';
                
                if (date.getMonth() === currentDate.getMonth()) {
                    dayElement.textContent = date.getDate();
                    
                    if (date.toDateString() === selectedDate.toDateString()) {
                        dayElement.className += ' bg-green text-white';
                    } else if (date >= new Date()) {
                        dayElement.className += ' bg-white';
                    } else {
                        dayElement.className += ' bg-gray-300 text-gray-500';
                    }
                    
                    dayElement.onclick = () => selectDate(date);
                } else {
                    dayElement.className += ' bg-gray-100 text-gray-400';
                }
                
                grid.appendChild(dayElement);
            }
        }

        function selectDate(date) {
            if (date < new Date()) return;
            
            selectedDate = date;
            document.getElementById('selectedDate').textContent = date.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            renderCalendar();
            loadTimeSlots(date);
        }

        function loadTimeSlots(date) {
            const dateStr = date.toISOString().split('T')[0];
            fetch(`/lessonPackages/{{ $lessonPackage->id }}/time-slots?date=${dateStr}`)
                .then(response => response.json())
                .then(slots => {
                    const container = document.getElementById('timeSlots');
                    container.innerHTML = '';
                    
                    if (slots.length === 0) {
                        container.innerHTML = '<p class="text-gray-500 text-center py-4">No available time slots for this date.</p>';
                    } else {
                        slots.forEach(slot => {
                            const button = document.createElement('button');
                            button.className = 'w-full bg-green text-white py-3 px-4 rounded-lg hover:bg-green-700 transition duration-200';
                            button.textContent = slot.start_time;
                            button.dataset.slotId = slot.id;
                            button.onclick = () => selectTimeSlot(slot.id);
                            container.appendChild(button);
                        });
                    }
                });
        }

        function selectTimeSlot(slotId) {
            selectedTimeSlot = slotId;
            document.getElementById('selectedTimeSlot').value = slotId;
            document.querySelector('#bookingForm button[type="submit"]').disabled = false;
            
            // Update button styles
            document.querySelectorAll('#timeSlots button').forEach(btn => {
                btn.classList.remove('bg-green-700');
                btn.classList.add('bg-green');
            });
            event.target.classList.remove('bg-green');
            event.target.classList.add('bg-green-700');
        }

        document.getElementById('prevMonth').onclick = () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        };

        document.getElementById('nextMonth').onclick = () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        };

        // Initialize
        renderCalendar();
    </script> --}}
</x-layout> 