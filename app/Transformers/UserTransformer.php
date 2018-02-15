<?php

namespace App\Transformers;
use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transformer(User $user)
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
            'alamat' => $user->alamat,
            'phone' => $user->phone,
            'registered' => $user->created_at->diffForHumans()
        ];
    }
}