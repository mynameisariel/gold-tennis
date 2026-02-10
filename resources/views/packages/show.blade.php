<x-layout>
    <div class="max-w-3xl mx-auto">
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-4">Package Purchase Details</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <div class="text-sm text-gray-500">Lesson</div>
                {{-- <div class="font-semibold">{{ $userPackage->lesson_package_id->title }}</div> --}}
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <div class="text-sm text-gray-500">Date</div>
                    {{-- <div class="font-medium">{{ $userPackage->timeSlot->date->format('F j, Y') }}</div> --}}
                </div>
                <div>
                    <div class="text-sm text-gray-500">Time</div>
                    {{-- <div class="font-medium">{{ $userPackage->timeSlot->start_time->format('g:i A') }} – {{ $userPackage->timeSlot->end_time->format('g:i A') }}</div> --}}
                </div>
            </div>

            {{-- <div class="mb-4">
                <div class="text-sm text-gray-500">Status</div>
                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $userPackage->status === 'cancelled' ? 'bg-red-100 text-red-800' : ($userPackage->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800') }}">
                    {{ ucfirst($userPackage->status) }}
                </span>
            </div> --}}

            @if($userPackage->notes)
                <div class="mb-6">
                    <div class="text-sm text-gray-500">Notes</div>
                    <div class="whitespace-pre-wrap">{{ $userPackage->notes }}</div>
                </div>
            @endif

            <div class="flex items-center gap-3">
                <a href="{{ route('packages.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Back to my userPackages</a>

                {{-- @if($userPackage->status !== 'cancelled')
                    <form method="POST" action="{{ route('userPackages.cancel', $userPackage) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Cancel userPackage</button>
                    </form>
                @endif --}}
            </div>
        </div>
    </div>
</x-layout>

