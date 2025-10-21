<x-app-layout>
<div class="max-w-3xl mx-auto py-10">
    <a href="{{ route('groups.show', $member->group->id) }}" class="text-yellow-600 hover:underline mb-4 inline-block">
        ← Back to {{ $member->group->name }}
    </a>

    <h1 class="text-2xl font-bold mb-6">Edit Member: {{ $member->name }}</h1>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700">Member Name</label>
            <input type="text" name="name" id="name" class="border rounded px-3 py-2 w-full" value="{{ $member->name }}" required>
        </div>

        <div class="mb-4">
            <label for="free_start" class="block font-medium text-gray-700">Free Start</label>
            <input type="time" name="free_start" id="free_start" class="border rounded px-3 py-2 w-full" value="{{ $member->free_start }}">
        </div>

        <div class="mb-4">
            <label for="free_end" class="block font-medium text-gray-700">Free End</label>
            <input type="time" name="free_end" id="free_end" class="border rounded px-3 py-2 w-full" value="{{ $member->free_end }}">
        </div>

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
            Update Member
        </button>
    </form>
</div>
</x-app-layout>
