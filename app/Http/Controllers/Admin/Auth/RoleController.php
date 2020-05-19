<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:super-admin']);
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('parent');
        return view('admin.roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        //  dd($request->name);
        $role = Role::create(['name' => $request->name]);
        $role->givePermissionTo($request->permissions);
        return redirect(route('admin.role'))->with('message', 'New Role is stored successfully successfully');
    }
    public function edit(Role $role)
    {
        $role        = $role->load('permissions');
        $permissions = Permission::all();
        // dd($permissions);
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role, Request $request)
    {
        $request->validate(['name' => 'required']);
        // dd($request->all());
        $role->syncPermissions($request->permissions);
        $request->replace($request->except(['permissions']));
        $role->update($request->all());
        return redirect(route('admin.role'))->with('message', 'You have updated Role successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->back()->with('message', 'You have deleted Role successfully');
    }
}
