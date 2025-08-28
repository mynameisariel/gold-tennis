<x-layout>
    <div class="max-w-4xl mx-auto">
        <x-heading>Contact Us</x-heading>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Contact Information -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4 text-green">Get in Touch</h2>
                
                <div class="space-y-4">
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">Head Coach</h3>
                        <p class="text-gray-600">Coach Ariel Liu</p>
                        <a href="mailto:goldtennisacad@gmail.com" class="text-green hover:text-green-900 transition-colors">
                            goldtennisacad@gmail.com
                        </a>
                    </div>

                    
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">General Inquiries</h3>
                        <a href="mailto:goldtennisacad@gmail.com" class="text-green hover:text-green-900 transition-colors">
                            goldtennisacad@gmail.com
                        </a>
                    </div>
                </div>
                
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h3 class="font-semibold text-gray-800 mb-2">Location</h3>
                    <p class="text-gray-600">Gold Tennis Academy</p>
                    <p class="text-gray-600">4008 Kelly Farm Drive</p>
                    <p class="text-gray-600">Ottawa, Ontario</p>
                </div>
            </div>
            
            <!-- Newsletter Subscription -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4 text-green">Stay Updated</h2>
                <p class="text-gray-600 mb-6">Subscribe to our newsletter for the latest tennis tips, tournament updates, and special offers!</p>
                
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form action="{{ route('contact.subscribe') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" id="name" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" id="email" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-green text-white py-2 px-4 rounded-lg hover:bg-green-700 transition duration-200">
                        Subscribe to Newsletter
                    </button>
                </form>
                
                <p class="text-xs text-gray-500 mt-4">
                    By subscribing, you agree to receive our newsletter. You can unsubscribe at any time.
                </p>
            </div>
        </div>
    </div>
</x-layout> 