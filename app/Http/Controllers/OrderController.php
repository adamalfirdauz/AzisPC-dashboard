<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Orders;
use Auth;
use Storage;
use App\Transformers\OrderTransformer;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user = Auth::user();
        $active = 11;
        return view('order.index', compact('active', 'user'));
    }
    public function waitingList(){
        $user = Auth::user();
        $active = 12;
        return view('order.waiting', compact('active', 'user'));
    }
    public function acceptedList(){
        $user = Auth::user();
        $active = 13;
        return view('order.accepted', compact('active', 'user'));
    }
    public function working(){
        $user = Auth::user();
        $active = 14;
        return view('order.working', compact('active', 'user'));
    }
    public function finish(){
        $user = Auth::user();
        $active = 15;
        return view('order.finished', compact('active', 'user'));
    }
    public function archives(){
        $user = Auth::user();
        $active = 16;
        return view('order.archives', compact('active', 'user'));
    }
}
