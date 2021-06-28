<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function index()
    {
        $this->authorize('module_access');

        $modules = Module::withCount('permissions')->paginate(10);
        return view('backend.module.index', compact('modules'));
    }

    public function create()
    {
        $this->authorize('module_create');

        return view('backend.module.create');
    }

    public function store(Request $request)
    {
        $this->authorize('module_create');

        $validatedData = $request->validate([
            'name' => 'required|unique:modules|string|max:255',
        ]);

        Module::create($validatedData);

        return redirect()
            ->back()
            ->with('message', 'Module has been created successfully!');
    }

    public function show(Module $module)
    {
        $this->authorize('module_access');

        return view('backend.module.show', compact('module'));
    }

    public function edit(Module $module)
    {
        $this->authorize('module_edit');

        return view('backend.module.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $this->authorize('module_edit');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:modules,name,'.$module->id,
        ]);

        $module->update($validatedData);

        return redirect()
            ->back()
            ->with('message', 'Module has been updated successfully!');
    }

    public function destroy(Module $module)
    {
        $this->authorize('module_delete');

        $module->delete();

        return redirect()
            ->back()
            ->with('message', 'Module has been deleted successfully!');
    }
}
