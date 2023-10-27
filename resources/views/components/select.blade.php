<!-- select option for create, providing the select for the options.
This is done by creating a foreach loop which loops through the array and provides
these individual array items as select options.
Which are then displayed in create and edit, as a dropdown -->
<!-- in order to not have to pass colours options here, I'd have to make a new App\View\Componet folder (that is seperate to the components folder) and extend component into it
seems like a waste of time, id rather create 3 files for my select boxes -->
<div>
    <select {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
    shadow-sm']) !!}>
    <option value="" selected>Select Colour</option> 
    @foreach(['red', 'green', 'mixed','black','white','orange','purple','blue','yellow','pink','brown'] as $colour)
        <option value="{{ $colour }}" {{ old('colour') === $colour ? 'selected' : '' }}>{{ ucfirst($colour) }}</option>
    @endforeach
    </select>
</div>
