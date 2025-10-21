<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function own()
    {
        $groups = Group::with(['members', 'activities'])
                       ->where('user_id', Auth::id())
                       ->orderBy('created_at', 'desc')
                       ->paginate(6);
        return view('groups.own', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date'
        ]);

        Group::create(array_merge($validated, [
            'user_id' => Auth::id(),]
        ));

        return redirect()->route('dashboard')->with('success', 'Group created successfully!');
    }

    public function show(Group $group)
    {
        $group->load(['user', 'members', 'activities']);
        return view('groups.show', compact('group'));
    }

    public function edit(Group $group)
    {
        $this->RestrictOwner($group);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $this->RestrictOwner($group);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date'
        ]);

        $group->update($validated);
        return redirect()->route('groups.show', $group->id)->with('success', 'Group updated successfully!');
    }

    public function destroy(Group $group)
    {
        $this->RestrictOwner($group);
        $group->delete();
        return redirect()->route('dashboard')->with('success', 'Group deleted successfully!');
    }

    private function RestrictOwner(Group $group)
    {
        if ($group->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
