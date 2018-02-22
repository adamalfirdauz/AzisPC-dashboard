<?php

namespace App\Transformers;
use App\User;
use League\Fractal\TransformerAbstract;
use App\Transformers\OrdersTransformer;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'orders'
    ];
    public function transform(User $user)
    {
        $foto = null;
        if($user->foto != null)
        {
            $foto = 'storage/'.$user->foto;
        }
        return [
            'id' => $user->id,
            'nama' => $user->name,
            'email' => $user->email,
            'alamat' => $user->alamat,
            'hp' => $user->phone,
            'role' => $user->status,
            'registered' => $user->created_at->diffForHumans(),
            'foto' => $foto
        ];
    }

    public function includeOrders(User $user)
    {
        $orders = $user->orders()->latestFirst()->get();
        return $this->collection($orders, new OrderTransformer);
    }
}