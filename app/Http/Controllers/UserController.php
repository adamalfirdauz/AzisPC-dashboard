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

    public function updateProfile(Request $request, User $user, $user_id)
    {
        $validatedData = $request->validate([
            'name' => 'regex:/^[a-zA-Z ]+$/|max:255',
            'password' => 'string|min:6',
            'phone' => 'string|min:10',
            'alamat' => 'string',
            'foto' => 'required|file'
        ]);
        // if($request->foto)
        // {
        //     $foto = base64_decode($request->foto);
        //     if ($user->foto) {
        //         Storage::delete($user->foto);
        //     }
        //     $foto = $foto->store('users/foto');
        //     $user->where('id', $user_id)->update([
        //         'foto' => $foto
        //     ]);
        // }
        // kalau file inputnya bisa
        // dd($request->foto[]);
        // dd($request->file('foto'));
        // dd($request->hasfile('foto'));
        // if($request->foto)
        // {
            if ($user->foto) {
                Storage::delete($user->foto);
            }
            $foto = $request->foto->store('users/foto');
            $user->where('id', $user_id)->update([
                'foto' => $foto
            ]);
        // }
        if($request->password)
        {
            $user->where('id', $user_id)->update([
                'password' => bcrypt($request->password)
            ]);
        }
        if($request->name)
        {
            $user->where('id', $user_id)->update([
                'name' => $request->name
            ]);
        }
        if($request->alamat)
        {
            $user->where('id', $user_id)->update([
                'alamat' => $request->alamat
            ]);
        }
        if($request->phone)
        {
            $user->where('id', $user_id)->update([
                'phone' => $request->phone
            ]);
        }
        $user = User::where('id', '=', $user_id)->get();
        return fractal()
            ->collection($user)
            ->transformWith(new UserTransformer)
            ->includeOrders()
            ->toArray();
    }
}
