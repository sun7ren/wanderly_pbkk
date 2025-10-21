<x-app-layout>
<div class="max-w-3xl mx-auto py-10">
    <a href="{{ route('groups.show', $activity->group->id) }}" class="text-yellow-600 hover:underline mb-4 inline-block">
        ← Back to {{ $activity->group->name }}
    </a>

    <h1 class="text-2xl font-bold mb-6">Edit Activity: {{ $activity->title }}</h1>

    <form action="{{ route('activities.update', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700">Activity Name</label>
            <input type="text" name="title" id="title" class="border rounded px-3 py-2 w-full" value="{{ $activity->title }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-gray-700">Description</label>
            <input type="text" name="description" id="description" class="border rounded px-3 py-2 w-full" value="{{ $activity->description }}">
        </div>

        <div class="mb-4">
            <label for="date" class="block font-medium text-gray-700">Date</label>
            <input type="date" name="date" id="date" class="border rounded px-3 py-2 w-full" value="{{ $activity->date }}" required>
        </div>

        <div class="mb-4">
            <label for="start_time" class="block font-medium text-gray-700">Start Time</label>
            <input type="time" name="start_time" id="start_time" class="border rounded px-3 py-2 w-full" value="{{ $activity->start_time }}">
        </div>

        <div class="mb-4">
            <label for="end_time" class="block font-medium text-gray-700">End Time</label>
            <input type="time" name="end_time" id="end_time" class="border rounded px-3 py-2 w-full" value="{{ $activity->end_time }}">
        </div>

        <div class="mb-4">
            <label for="location" class="block font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" class="border rounded px-3 py-2 w-full" value="{{ $activity->location }}">
        </div>

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-blue-600">
            Update Activity
        </button>
    </form>
</div>
</x-app-layout>
