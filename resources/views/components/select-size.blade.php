
<!-- in order to not have to pass size options here, I'd have to make a new App\View\Componet folder (that is seperate to the components folder) and extend component into it
seems like a waste of time, id rather create 3 files for my select boxes -->
<div>
    <select {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
    shadow-sm']) !!}>
    <option value="" selected>Select Size</option>
    @foreach(['small', 'medium', 'large'] as $size)
        <option value="{{ $size }}" {{ old('size') === $size ? 'selected' : '' }}>{{ ucfirst($size) }}</option>
    @endforeach
    </select>
</div>
