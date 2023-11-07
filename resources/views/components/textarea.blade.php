@props(['disabled' => false, 'field' => '', 'value' => ''])
 
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-red-300 dark:border-gray-700 dark:bg-pink-200 dark:text-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-purple-600 rounded-md shadow-sm']) !!}>
    {{ $value }}
</textarea>
 
