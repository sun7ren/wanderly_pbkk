<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create New Group') }}
    </h2>
</x-slot>
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center text-[#B76A6A] mt-10">Your Next Hangout</h1>
    <form action="{{ route('groups.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-xl shadow">
        @csrf

        <div>
            <label class="block font-medium mb-1">Group Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Description:</label>
            <textarea name="description" class="border rounded w-full p-2">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="bg-[#B76A6A] text-white px-4 py-2 rounded-xl hover:bg-red-800">
            Create Group
        </button>
    </form>
</div>
</x-app-layout>
<x-footer-home/>