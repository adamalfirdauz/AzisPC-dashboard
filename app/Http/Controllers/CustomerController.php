<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\CustomerTransformer;
use App\Customer;
Use Auth;

class CustomerController extends Controller
{
    public function users(Customer $user){
        $users = $user->all();
        // return response()->json($users);
        return fractal()
            ->collection($users)
            ->transformWith(new CustomerTransformer)
            ->toArray();
    }
    public function profile(Customer $user){
        $user = $user->find(Auth::customer()->id);
        return fractal()
            ->item($user)
            ->transformWith(new CustomerTransformer)
            ->toArray();
    }
}
