
<title>Dashboard for Pet Toy Store</title>
<!-- main dashboard page for the website -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-pink-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white-900 border-4 border-solid border-pink-300 font-bold text-red-800">
                        {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
