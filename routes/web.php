<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GroupController;
use App\Models\User;
use App\Models\Group;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');;


Route::get('/dashboard', function () {
    $groups = Group::with(['members', 'activities', 'user'])
                   ->orderBy('created_at', 'desc')
                   ->paginate(6);
    return view('dashboard', compact('groups'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');
    Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
    Route::get('/groups', [GroupController::class, 'own'])->name('groups.own');

    Route::get('/members/create/{group}', [MemberController::class, 'create'])->name('members.create');
    Route::post('/members/{group}', [MemberController::class, 'store'])->name('members.store');
    Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

    Route::get('/activities/create/{group}', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');
});

require __DIR__.'/auth.php';
