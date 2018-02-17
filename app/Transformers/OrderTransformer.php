<?php

namespace App\Transformers;
use App\Orders;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    public function transform(Orders $order)
    {
        return [
            'id'            => $order->id,
            'nama'          => $order->nama,
            'alamat'        => $order->alamat,
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