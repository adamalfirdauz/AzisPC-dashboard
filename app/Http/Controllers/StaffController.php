<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    public function create(Request $data)
    {
        $validatedData = $data->validate([
            'name' => 'required|regex:/^[a-zA-Z ]+$/|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'status' => 'required|string',
            'phone' => 'required|string|min:10',
            'alamat' => 'required|string',
            'foto' => 'file|image'
        ]);
        $foto = $data->file('foto')->store('users/foto');
        // dd($data['foto']);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => $data['status'],
            'phone' => $data['phone'],
            'alamat' => $data['alamat'],
            'api_token' => bcrypt($data['email']),
            'foto' => $foto,
        ]);
        return back()->with('success', 'Pegawai telah ditambahkan!');
    }
}
