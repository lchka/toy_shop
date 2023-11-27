@props(['animals', 'field' => '', 'selected' => null])

<select {{ $attributes->merge(['class' => 'border-red-300 dark:border-gray-700 dark:bg-purple-200 dark:text-gray-900
    focus:border-indigo-500 dark:focus:ring-purple-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
    rounded-md shadow-sm form-select']) }}>
    <option value="">Select Animal</option> <!-- Placeholder or default option -->
    @foreach ($animals as $animal)
        <option value="{{ $animal->id }}" {{ $selected == $animal->id ? 'selected' : '' }}>
            {{ $animal->animal_name }} ({{ $animal->breed }})
        </option>
    @endforeach
</select>

@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
