<x-app-layout>
<div class="max-w-3xl mx-auto py-10">
    <a href="{{ route('groups.show', $group->id) }}" class="text-red-700 hover:underline mb-4 inline-block">
        ← Back to {{ $group->name }}
    </a>
    
    <h1 class="text-2xl font-bold mb-6">Add Member to {{ $group->name }}</h1>

    <form action="{{ route('members.store', $group->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700">Member Name</label>
            <input type="text" name="name" id="name" class="border rounded px-3 py-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="free_start" class="block font-medium text-gray-700">Free Start</label>
            <input type="time" name="free_start" id="free_start" class="border rounded px-3 py-2 w-full">
        </div>

        <div class="mb-4">
            <label for="free_end" class="block font-medium text-gray-700">Free End</label>
            <input type="time" name="free_end" id="free_end" class="border rounded px-3 py-2 w-full">
        </div>

        <button type="submit" class="bg-red-400 text-white px-4 py-2 rounded hover:bg-red-300">
            Add Member
        </button>
    </form>
</div>
</x-app-layout>
<x-footer-home/>