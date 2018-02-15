<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Transformers\CustomerTransformer;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request, Customer $user)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6'
        ]);

        $user = $user->create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'api_token'     => bcrypt($request->email),
            'phone'         => $request->phone,
            'alamat'        => $request->alamat,
            // 'status'        => $request->status,
        ]);

        $response = fractal()
            ->item($user)
            ->transformWith(new CustomerTransformer)
            ->addMeta([
                'token' => $user->api_token,
            ])
            ->toArray();
        return response()->json($response, 201);
    }

    public function login(Request $request, Customer $user){
        // dd(Auth::user()->id);
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json(['error' => 'Email atau Password salah!', 'hash' => bcrypt($request->password)], 401);
        }
        $user = $user->find(Auth::customer()->id);
        return fractal()
            ->item($user)
            ->transformWith(new CustomerTransformer)
            ->addMeta([
                'token' => $user->api_token,
            ])
            ->toArray();
    }
}
