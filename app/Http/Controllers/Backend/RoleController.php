<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $this->authorize('role_access');

        $roles = Role::withCount('users', 'permissions')->paginate(10);
        return view('backend.role.index', compact('roles'));
    }

    public function create()
    {
        $this->authorize('role_create');

        $modules = Module::with('permissions')->get();
        return view('backend.role.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $this->authorize('role_create');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'identifier' => 'required|string|alpha_dash|max:255|unique:roles',
            'permissions.*' => 'integer',
            'permissions' => 'required|array',
        ]);

        $role = Role::create($validatedData);

        $role->permissions()->sync($request->permissions);

        return redirect()
            ->back()
            ->with('message', 'Role has been created successfully!');
    }

    public function show(Role $role)
    {
        $this->authorize('role_access');

        $role->load(['users','permissions']);
        return view('backend.role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $this->authorize('role_edit');

        $modules = Module::with('permissions')->get();
        return view('backend.role.edit', compact('role','modules'));
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('role_edit');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$role->id,
            'identifier' => 'required|string|alpha_dash|max:255|unique:roles,identifier,'.$role->id,
            'permissions' => 'required|array',
        ]);

        $role->update($validatedData);

        $role->permissions()->sync($request->permissions);

        return redirect()
            ->back()
            ->with('message', 'Role has been updated successfully!');
    }

    public function destroy(Role $role)
    {
        $this->authorize('role_delete');

        $role->delete();

        return redirect()
            ->back()
            ->with('message', 'Role has been deleted successfully!');
    }
}
