<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use App\UserNotification;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{

    protected $redirectTo = '/admin/login';


    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        // $role = Role::create(['name' => 'reader']);
        // $permission1 = Permission::create(['name' => 'edit BOOK']);
        // $permission2 = Permission::create(['name' => 'edit articles']);
        // $permission =Permission ::findByName('edit BOOK');
        // $role = Role::findByName('writer');
        // $role->syncPermissions($permission);

    //    return user()->getAllPermissions();
  
    return view('admin.home');
    }
}
