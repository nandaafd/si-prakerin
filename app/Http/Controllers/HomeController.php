<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'superadmin') {
            return redirect('superadmin/home');
        } else if (Auth::user()->role == 'admin') {
            return redirect('admin/home');
        } else {
            return redirect('user/home');
        }
    }

    public function superadminHome() {
        return view('dashboard');
    }

    public function adminHome() {
        // return view('admin.home');
        return view('dashboard');
    }

    public function userHome() {
        // return view('user.home');
        return view('dashboard');
    }
}
