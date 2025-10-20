<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;


class MemberController extends Controller
{
    public function create(Group $group)
    {
        $this->RestrictOwner($group);
        return view('members.create', compact('group'));
    }

    public function store(Request $request, Group $group)
    {
        $this->RestrictOwner($group);

        $request->validate([
            'name' => 'required|string|max:255',
            'free_start' => 'required',
            'free_end' => 'required',
        ]);

        Member::create([
            'name' => $request->name,
            'free_start' => $request->free_start, 
            'free_end' => $request->free_end,
            'group_id' => $group->id,]);

        return redirect()->route('groups.show', $group->id)->with('success', 'Member added successfully!');
    }

    public function edit(Member $member)
    {
        $this->RestrictOwner($member->group);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $this->RestrictOwner($member->group);

        $request->validate([
            'name' => 'required|string|max:255',
            'free_start' => 'required',
            'free_end' => 'required',
        ]);

        $member->update($request->only('name', 'free_start', 'free_end'));

        return redirect()->route('groups.show', $member->group->id)->with('success', 'Member updated successfully!');
    }

    public function destroy(Member $member)
    {
        $this->RestrictOwner($member->group);
        $member->delete();

        return redirect()->route('groups.show', $member->group_id)->with('success', 'Member deleted successfully!');
    }

    private function RestrictOwner(Group $group)
    {
        if ($group->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
