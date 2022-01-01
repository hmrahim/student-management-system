<?php

namespace App\Http\Controllers;

use App\model\admin\student\studentClass;
use Illuminate\Http\Request;

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
        return view('backend.index');
    }
    public function home(){
        return view("home");
    }

    public function frontend(){
        return view("frontend.homepage.home");

    }
}
