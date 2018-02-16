<?php

namespace App\Transformers;
use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'nama' => $user->name,
            'email' => $user->email,
            'alamat' => $user->alamat,
            'hp' => $user->phone,
            'role' => $user->status,
            'registered' => $user->created_at->diffForHumans(),
        ];
    }
}