<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'bg-blue-400 hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-800 text-white border-2 border-blue-400 font-bold text-lg py-0.5 px-5 rounded cursor-pointer transition duration-100 ease-in-out'
]) }}>
    {{ $slot }}
</button>
