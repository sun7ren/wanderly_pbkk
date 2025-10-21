<x-app-layout>
<div class="container mx-auto p-4">
    <a href="{{ route('dashboard') }}" class="text-red-500 hover:underline mb-4 inline-block">← Back to Groups</a>

    <h1 class="text-3xl font-bold mb-2">{{ $group->name }}</h1>
    <p class="text-gray-600 mb-6">Owner: {{ $group->user->name }}</p>

    {{-- Members --}}
    <div class="bg-white rounded-2xl shadow p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Members</h2>
        <ul class="space-y-3">
            @foreach ($group->members as $member)
                <li class="border-b pb-2 flex justify-between items-center">
                    <span>
                        <strong>{{ $member->name }}'s Free Time:</strong> {{ $member->free_start }} to {{ $member->free_end }}
                    </span>
                    @if (Auth::id() === $group->user_id)
                        <div class="space-x-2">
                            <a href="{{ route('members.edit', $member->id) }}" class="text-red-400 hover:underline">Edit</a>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-700 hover:underline">Delete</button>
                            </form>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>

        @if (Auth::id() === $group->user_id)
            <a href="{{ route('members.create', $group->id) }}" 
                class="bg-[#B76A6A] text-white px-3 py-2 rounded-xl hover:bg-red-800 mt-4 inline-block">
                <div class="inline-flex items-center gap-2 justify-center align-middle">
                    <x-ri-add-circle-fill class="w-5 h-5 fill-white"/> Add Member
                </div>
            </a>
        @endif
    </div>

    {{-- Activities --}}
    <div class="bg-white rounded-2xl shadow p-6 mb-20">
        <h2 class="text-2xl font-semibold mb-4">Activities</h2>
        <ul class="space-y-3">
            @foreach ($group->activities as $activity)
                <li class="border-b pb-2 flex justify-between items-center">
                    <div>
                        <strong>{{ $activity->title }}</strong>
                        <span class="text-gray-600 block">
                            Time: {{ $activity->start_time }} - {{ $activity->end_time }}
                        </span>
                        <span class="text-gray-600 block">
                            Location: {{ $activity->location }}
                        </span>
                    </div>
                    @if (Auth::id() === $group->user_id)
                        <div class="space-x-2">
                            <a href="{{ route('activities.edit', $activity->id) }}" class="text-red-400 hover:underline">Edit</a>
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-700 hover:underline">Delete</button>
                            </form>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>

        @if (Auth::id() === $group->user_id)
            <a href="{{ route('activities.create', $group->id) }}" 
                class="bg-[#E19E91] text-white px-3 py-2 rounded-xl hover:bg-red-300 mt-4 inline-block">
                <div class="inline-flex items-center gap-2 justify-center align-middle">
                    <x-ri-add-circle-fill class="w-5 h-5 fill-white"/>Add Activity
                </div>
            </a>
        @endif
    </div>
</div>
</x-app-layout>
<x-footer-home/>
