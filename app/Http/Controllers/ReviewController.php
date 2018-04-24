<?php

namespace App\Http\Controllers;

use App\Transformers\ReviewTransformer;
use Illuminate\Http\Request;
use App\Reviews;
use App\Orders;
use Auth;

class ReviewController extends Controller
{
    public function add(Request $request, Reviews $review){
        // $this->authorize('create', $review);
        $this->validate($request, [
            'orderId' => 'required',
            'customerId' => 'required',
            'content' => 'required',
            'foto' => 'file|image',
        ]);
        $review = $review->create([
            'orderId' => $request->orderId,
            'customerId' => $request->customerId,
            'content' => $request->content
        ]);
        if($request->hasfile('foto'))
        {
            if ($review->foto) {
                Storage::delete($review->foto);
            }
            $foto = $request->file('foto')->store('users/review/'.Auth::user()->email);
            $review->where('id', $review->id)->update([
                'foto' => $foto
            ]);
        }
        $review = Reviews::where('id', '=', $review->id)->first();
        $order = Orders::where('id', '=', $review->orderId)->first();
        $order->isReviewed = 1;
        $order->save();
        $response = fractal()
            ->item($review)
            ->TransformWith(new ReviewTransformer)
            ->toArray();
        return response()->json($response, 201);
    }
    public function getAll(Reviews $review){
        $review = $review->orderBy('created_at')->get();
        return fractal()
            ->collection($review)
            ->transformWith(new ReviewTransformer)
            ->includeOrders()
            ->toArray();
    }
}
