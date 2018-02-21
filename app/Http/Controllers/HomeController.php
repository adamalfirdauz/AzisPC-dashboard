<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('staff');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $active = 0;
        return view('pages.example', compact('active', 'user'));
    }

    public function dashboard(){
        $this->middleware('staff');
        $user = Auth::user();
        $active = 0;
        // $path = Auth::user()->foto;
        // dd($path);
        return view('pages.example', compact('active', 'user'));
    }
}
