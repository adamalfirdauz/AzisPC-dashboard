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
        $active = 1;
        return view('staff.index', compact('active'));
    }
    public function addStaff(){
        $active = 2;
        return view('staff.create', compact('active'));
    }
    public function listStaff(){
        $active = 3;
        return view('staff.list', compact('active'));
    }
}
