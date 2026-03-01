<a href="{{ $href }}" {{ $attributes->merge(['class' => 'bg-green text-white px-4 py-2 rounded-lg hover:bg-darkgreen transition duration-200']) }}>
    {{ $slot }}
</a>
