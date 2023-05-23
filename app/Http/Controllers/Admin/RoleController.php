<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Role created successfully');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:roles,id'
        ]);

        Role::find($request->id)->delete();

        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
