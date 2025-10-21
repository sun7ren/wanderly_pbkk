<x-app-layout>
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Add Activity to {{ $group->name }}</h1>

    @if($overlapStart && $overlapEnd)
    <p class="mb-4 text-red-600">
        Available overlapping time: {{ \Carbon\Carbon::parse($overlapStart)->format('H:i') }} 
        to {{ \Carbon\Carbon::parse($overlapEnd)->format('H:i') }}
    </p>

    <form action="{{ route('activities.store', $group->id) }}" method="POST">
        @csrf
        <input type="hidden" name="group_id" value="{{ $group->id }}">

        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700">Activity Name</label>
            <input type="text" name="title" id="title" class="border rounded px-3 py-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-gray-700">Description</label>
            <input type="text" name="description" id="description" class="border rounded px-3 py-2 w-full">
        </div>

        <div class="mb-4">
            <label for="start_time" class="block font-medium text-gray-700">Start Time</label>
            <input type="time" name="start_time" id="start_time" class="border rounded px-3 py-2 w-full"
                   min="{{ $overlapStart }}" max="{{ $overlapEnd }}" required>
        </div>

        <div class="mb-4">
            <label for="end_time" class="block font-medium text-gray-700">End Time</label>
            <input type="time" name="end_time" id="end_time" class="border rounded px-3 py-2 w-full"
                   min="{{ $overlapStart }}" max="{{ $overlapEnd }}" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" class="border rounded px-3 py-2 w-full">
        </div>

        <button type="submit" class="bg-red-400 text-white px-4 py-2 rounded hover:bg-red-300">
            Add Activity
        </button>
    </form>
    @else
        <p class="text-red-500 font-semibold">
            No overlapping free time between members. Cannot schedule activity.
        </p>
    @endif
</div>
</x-app-layout>
