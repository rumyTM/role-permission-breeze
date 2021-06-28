<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index()
    {
        $this->authorize('permission_access');

        $permissions = Permission::with('module')->paginate(10);
        return view('backend.permission.index', compact('permissions'));
    }

    public function create()
    {
        $this->authorize('permission_create');

        $modules = Module::all();
        return view('backend.permission.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $this->authorize('permission_create');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
            'identifier' => 'required|string|alpha_dash|max:255|unique:permissions',
            'module_id' => 'required|integer|max:255',
        ]);

        Permission::create($validatedData);

        return redirect()
            ->back()
            ->with('message', 'Permission has been created successfully!');
    }

    public function show(Permission $permission)
    {
        $this->authorize('permission_access');

        return view('backend.permission.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        $this->authorize('permission_edit');

        $modules = Module::all();
        return view('backend.permission.edit', compact('permission', 'modules'));
    }

    public function update(Request $request, Permission $permission)
    {
        $this->authorize('permission_edit');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,'.$permission->id,
            'identifier' => 'required|string|alpha_dash|max:255|unique:permissions,identifier,'.$permission->id,
            'module_id' => 'required|integer|max:255',
        ]);

        $permission->update($validatedData);

        return redirect()
            ->back()
            ->with('message', 'Permission has been updated successfully!');
    }

    public function destroy(Permission $permission)
    {
        $this->authorize('permission_delete');

        $permission->delete();

        return redirect()
            ->back()
            ->with('message', 'Permission has been deleted successfully!');
    }
}
