<a {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-green inline-block px-5 py-1.5 text-white transition duration-500 hover:bg-black rounded-lg text-sm font-bold leading-normalt']) }}>
    {{ $slot }}
</a>
