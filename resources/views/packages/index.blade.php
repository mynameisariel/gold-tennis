<x-layout>
    <div class="max-w-5xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">My Packages</h1>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lesson</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($userPackages as $userPackage)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $userPackage->lessonPackage->title }}
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $userPackage->timeSlot->date->format('F j, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $userPackage->timeSlot->start_time->format('g:i A') }} – {{ $userPackage->timeSlot->end_time->format('g:i A') }}
                            </td> --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $userPackage->status === 'cancelled' ? 'bg-red-100 text-red-800' : ($userPackage->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($userPackage->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-3">
                                <a href="{{ route('packages.show', $userPackage) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                @if($userPackage->status !== 'cancelled')
                                    <form action="{{ route('packages.cancel', $userPackage) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Cancel</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">You have not purchased any lesson packages yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>

