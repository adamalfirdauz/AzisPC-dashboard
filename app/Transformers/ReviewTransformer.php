<?php

namespace App\Transformers;
use App\User;
use App\Orders;
use App\Reviews;
use League\Fractal\TransformerAbstract;

class ReviewTransformer extends TransformerAbstract
{
    public function transform(Reviews $review)
    {
        $order = Orders::where('id', '=', $review->orderId)->first();
        $customer = User::where('id', '=', $review->customerId)->first();
        // dd($order);
        return [
            'id' => $review->id,
            'customerId' => $customer->id,
            'orderId' => $order->id,
            'customerName' => $customer->name,
            'content' => $review->content,
            'fotoSebelum' => 'storage/'.$order->foto,
            'fotoSesudah' => 'storage/'.$order->fotoReparasi,
            'created_at' => $review->created_at
            // 'foto' => 'storage/'.$review->foto,
        ];
    }
}