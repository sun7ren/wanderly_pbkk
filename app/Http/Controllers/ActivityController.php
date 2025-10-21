<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ActivityController extends Controller
{
    public function create(Group $group)
    {
        if($group->user_id !== Auth::id()){
            $overlapStart = null;
            $overlapEnd = null;
        } else {
            $overlapStart = $members = $group->members->max('free_start');
            $overlapEnd = $members = $group->members->min('free_end');
        }
        
        if ($overlapStart >= $overlapEnd) {
            $overlapStart = $overlapEnd = null;
        }

        return view('activities.create', compact('group', 'overlapStart', 'overlapEnd'));
    }

    public function store(Request $request, Group $group)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after_or_equal:start_time',
            'location' => 'nullable|string|max:255',
            'group_id' => 'required|exists:groups,id',
        ]);

        $group = Group::findOrFail($request->group_id);
        $this->RestrictOwner($group);

        Activity::create($request->only('title', 'description', 'date', 'start_time', 'end_time', 'location', 'group_id'));

        return redirect()->route('groups.show', $group->id)->with('success', 'Activity created successfully!');
    }

    public function edit(Activity $activity)
    {
        $this->RestrictOwner($activity->group);
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $this->RestrictOwner($activity->group);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after_or_equal:start_time',
            'location' => 'nullable|string|max:255',
        ]);

        $activity->update($request->only('title', 'description', 'date', 'start_time', 'end_time', 'location'));

        return redirect()->route('groups.show', $activity->group->id)->with('success', 'Activity updated successfully!');
    }

    public function destroy(Activity $activity)
    {
        $this->RestrictOwner($activity->group);
        $activity->delete();

        return redirect()->route('groups.show', $activity->group_id)->with('success', 'Activity deleted successfully!');
    }

    private function RestrictOwner(Group $group)
    {
        if ($group->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
