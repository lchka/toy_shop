

@if (session('success'))
<div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
    {{ $slot }} 
    <!-- slot is used to pull a specific view that will be associated with where the alert message is being sent too -->
</div>
@endif