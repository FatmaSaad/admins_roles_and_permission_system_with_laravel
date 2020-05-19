<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:super-admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions =  Permission::all();
        return view('admin.permissions.index', compact('permissions'));
        // return response(['data' => Permission::all()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return response(['data' => $permission], 200);
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('parent');
        return view('admin.permissions.create', compact('permissions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $permission = Permission::create(['name' => $request->name]);
        return redirect(route('admin.permission'))->with('message', 'New Permission is stored successfully successfully');

        // return response(['data' => $permission], Response::HTTP_CREATED);

    }
    public function edit( Permission $permission)
    {
        $permission        = $permission->load('permissions');
        return view('admin.permissions.edit', compact('permission', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect(route('admin.permission'))->with('message', 'New Permission is updated successfully');

        // return response(['data' => $permission], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect(route('admin.permission'))->with('message', 'New Permission is deleted');
        // return response(null, Response::HTTP_NO_CONTENT);
    }
}
