<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       $users = User::with('groups')->get();
        return view('dashboard', compact('users'));
    }

    public function show($id)
    {
        $user = User::with(['groups.members', 'groups.activities'])->findOrFail($id);
        return view('users.show', compact('user'));
    }

}
