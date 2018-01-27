<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $user = Auth::user();
        $active = 1;
        return view('staff.index', compact('active', 'user'));
    }
    public function addStaff(){
        $user = Auth::user();
        $active = 2;
        return view('staff.create', compact('active', 'user'));
    }
    public function listStaff(){
        $user = Auth::user();
        $active = 3;
        return view('staff.list', compact('active', 'user'));
    }
}
