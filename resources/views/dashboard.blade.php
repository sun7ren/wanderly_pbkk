<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
    @foreach ($groups as $group)
        <div class="bg-white shadow rounded-2xl p-6 border border-1
                    @if($group->user_id === Auth::id()) border-2 border-red-300 @endif">
            <div class="flex justify-between flex-row">
                <h2 class="text-xl font-semibold mb-2">{{ $group->name }}</h2>
                @if($group->user_id === Auth::id())
                    <div class="space-x-2">
                        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">
                                <x-ri-delete-bin-6-fill class="w-7 h-7 fill-red-400"/>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <h3 class="text-lg font-medium mb-1">Description: {{ $group->description }}</h3>
            <p class="text-gray-600 mb-2">Owner: {{ $group->user->name }}</p>
            <p class="text-gray-500 mb-2">
                Members: {{ $group->members->count() }} | Activities: {{ $group->activities->count() }}
            </p>
            <a href="{{ route('groups.show', $group->id) }}" class="text-red-400 hover:underline">
                View Details →
            </a>

            @if($group->user_id === Auth::id())
                <div class="mt-4 space-x-2">
                    <a href="{{ route('members.create', $group->id) }}" 
                       class="bg-[#B76A6A] text-white px-3 py-2 rounded-xl hover:bg-red-800 inline-block">
                       <div class="inline-flex items-center gap-2 justify-center align-middle">
                            <x-ri-add-circle-fill class="w-5 h-5 fill-white"/> Add Member
                        </div>
                    </a>
                    <a href="{{ route('activities.create', $group->id) }}" 
                       class="bg-[#E19E91] text-white px-3 py-2 rounded-xl hover:bg-red-300 inline-block">
                       <div class="inline-flex items-center gap-2 justify-center align-middle">
                            <x-ri-add-circle-fill class="w-5 h-5 fill-white"/>Add Activity
                        </div>
                    </a>
                </div>
            @endif
        </div>
    @endforeach
    <div class="mt-2 mb-10 col-span-1 md:col-span-2">
        {{ $groups->links() }}
    </div>
</div>
</x-app-layout>
<x-footer-home/>