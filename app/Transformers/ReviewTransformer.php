<?php

namespace App\Transformers;
use App\User;
use App\Reviews;
use League\Fractal\TransformerAbstract;

class ReviewTransformer extends TransformerAbstract
{
    public function transform(Reviews $review)
    {
        // $review = Reviews::where('id', '=', $review->id)->first();
        return [
            'id' => $review->id,
            'customerId' => $review->customerId,
            'orderId' => $review->orderId,
            'content' => $review->content,
            'foto' => 'storage/'.$review->foto,
        ];
    }
}