<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use App\User;
use Auth;

class UserController extends Controller
{
    public function users(User $user)
    {
        $users = $user->all();
        return fractal()
            ->collection($users)
            ->transformWith(new UserTransformer)
            ->toArray();
    }

    public function profile(User $user)
    {
        $user = $user->find(Auth::user()->id);
        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->includeOrders()
            ->toArray();
    }

    public function profileById(User $user, $id)
    {
        $user = $user->find($id);
        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->includeOrders()
            ->toArray();
    }
}
