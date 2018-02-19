<?php

namespace App\Transformers;
use App\Orders;
use App\User;
use Auth;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    public function transform(Orders $order)
    {
        $user = new User;
        $user = $user->find(Auth::user()->id);
        return [
            'id'            => $order->id,
            'namaBarang'    => $order->nama,
            'alamat'        => $order->alamat,
            'hp'            => $user->phone,
            'user_id'       => $order->user_id,
            'dateIn'        => $order->dateIn,
            'dateOut'       => $order->dateOut,
            'tipeKerusakan' => $order->tipeKerusakan,
            'keluhan'       => $order->keluhan,
            'kelengkapan'   => $order->kelengkapan,
            'status'        => $order->status,
            'harga'         => $order->harga,
            'dp'            => $order->dp,
            'longitude'     => $order->longitude,
            'langitude'     => $order->langitude,
        ];
    }
}