<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $redirectTo = '/admin/login';


    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {


/*        dd(\Auth::user());*/

        return view('admin.home');
    }


}
