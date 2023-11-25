<!-- x-select-animal.blade.php -->

<!-- this method can be used to pass array values for select size and colour, test when many to many is working -->
@props(['animals', 'field' => '', 'selected' => null])

<select {{ $attributes->merge(['class' => 'form-select']) }}>
    <option value="">Select Animal</option> <!-- Placeholder or default option -->
    @foreach ($animals as $animal)
        <option value="{{ $animal->id }}">{{ $animal->animal_name }}</option>
    @endforeach
</select>

@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
