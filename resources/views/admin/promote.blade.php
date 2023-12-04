<!-- resources/views/promote.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-800 leading-tight">
            {{ __('Promote User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div style="font-size: 22px;" class=" font-bold text-gray-800 dark:text-gray-700">
                    {{ __("Promote User to Admin") }}
                </div>

                <!-- User Promotion Form -->
                <form action="{{ route('admin.promoteUser') }}" method="POST" class="mt-6">
                    @csrf
                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 dark:text-red-300 font-bold">
                            {{ __('Select User to Promote') }}:
                        </label>
                        <div class="relative">
                            <select name="user_id" id="user_id" class="custom-select">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 dark:text-gray-300">
                                <!-- Heroicon name: selector -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 0 0-1 1v14a1 1 0 0 0 2 0V3a1 1 0 0 0-1-1zm-4 4a1 1 0 1 0-2 0v6a1 1 0 0 0 2 0V6zm8 0a1 1 0 1 0-2 0v6a1 1 0 0 0 2 0V6z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <x-primary-button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Promote to Admin') }}
                    </x-primary-button>
                </form>
                <!-- End of User Promotion Form -->
            </div>
        </div>
    </div>
</x-app-layout>
