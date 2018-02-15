<?php

namespace App\Transformers;

use App\Customer;
use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{
    public function transform(Customer $user){
        return [
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'password'      => $user->password,
            // 'status'        => $user->status,
            'registered'    => $user->created_at->diffForHumans(),

        ];
    }
}