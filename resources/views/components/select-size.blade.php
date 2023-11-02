<!-- select option for create, providing the select for the options.


in order to be able to pass a foreach into the EDIT, i must use a normal select not a component, (due to the fact that the old isnt working as it when it searches for the array in edit it comes out a null, and acts as if nothing is selected returning no @old) .
hence i am keeping this component here for the record. But it will only worl in create, whilst for edit i will use a class from css which then allows the old to work -->
<div>
    <select {!! $attributes->merge(['class' => 'border-red-300 dark:border-gray-700 dark:bg-pink-200 dark:text-gray-900
    focus:border-indigo-500 dark:focus:ring-purple-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
    shadow-sm']) !!}>
    <option value="" selected >Select Size</option>
    @foreach(['small', 'medium', 'large'] as $size)
        <option value="{{ $size }}" {{ old('size') === $size ? 'selected' : '' }}>{{ ucfirst($size) }}</option>
    @endforeach
    </select>
</div>
