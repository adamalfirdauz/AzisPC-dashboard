<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use App\User;
use Auth;
use Storage;
use Illuminate\Support\Facades\DB;

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

    public function updateProfile(Request $requset, User $user, $user_id)
    {
        if ($user->foto) {
            Storage::delete($user->foto);
        }
        $foto = $requset->file('foto')->store('users/foto');
        $user->where('id', $user_id)->update([
            'name' => $requset->name,
            'password' => bcrypt($requset->password),
            'alamat' => $requset->alamat,
            'phone' => $requset->phone,
            'foto' => $foto
        ]);
        $user = User::where('id', '=', $user_id)->get();
        return fractal()
            ->collection($user)
            ->transformWith(new UserTransformer)
            // ->includeOrders()
            ->toArray();
    }
}
