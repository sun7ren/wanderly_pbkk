<x-app-layout>
<div class="max-w-3xl mx-auto py-10">
    <a href="{{ route('dashboard')}}" class="text-yellow-600 hover:underline mb-4 inline-block">
        ← Back to Dashboard
    </a>

    <h1 class="text-2xl font-bold mb-6">Edit Group: {{ $group->name }}</h1>

    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Group Name:</label>
            <input type="text" name="name" value="{{ $group->name }}" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Description:</label>
            <textarea name="description" class="border rounded w-full p-2">{{ $group->description }}</textarea>
        </div class="mb-4">

        <div class="mb-4">
            <label for="date" class="block font-medium mb-1">Date:</label>
             <input type="date" id="date" name="date" class="border rounded w-full p-2" value="{{ $group->date }}" required>
        </div>

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
            Update Group
        </button>
    </form>
</div>
</x-app-layout>
<x-footer-home/>
