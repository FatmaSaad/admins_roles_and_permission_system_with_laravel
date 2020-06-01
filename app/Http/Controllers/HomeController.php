<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use Session;
use App;
use Config;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('Language');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function Language($lang)
    {
        
        Session::put('locale', $lang);
        return redirect()->back();
    }
}
