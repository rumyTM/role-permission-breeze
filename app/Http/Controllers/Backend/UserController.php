<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $this->authorize('user_access');

        $users = User::withCount('roles')->paginate(10);
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('user_create');

        $roles = Role::all();
        return view('backend.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->authorize('user_create');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'roles.*' => 'integer',
            'roles' => 'required|array',
        ]);

        $user = User::create($validatedData);

        $user->roles()->sync($request->roles);

        return redirect()
            ->back()
            ->with('message', 'User has been created successfully!');
    }

    public function show(User $user)
    {
        $this->authorize('user_access');

        $user->load(['roles']);
        return view('backend.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('user_edit');

        $roles = Role::all();
        return view('backend.user.edit', compact('roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('user_edit');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'roles.*' => 'integer',
            'roles' => 'required|array',
        ]);

        $user->update($validatedData);

        $user->roles()->sync($request->roles);

        return redirect()
            ->back()
            ->with('message', 'User has been updated successfully!');
    }

    public function destroy(User $user)
    {
        $this->authorize('user_delete');

        $user->delete();

        return redirect()
            ->back()
            ->with('message', 'User has been deleted successfully!');
    }
}
