@if (session('success'))
<div class="mb-4 px-4 py-2 bg-yellow-100 border border-orange-200 text-gray-700 rounded-md shadow-md">
    {{ session('success') }}
</div>
@endif
