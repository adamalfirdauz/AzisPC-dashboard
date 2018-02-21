<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Orders;
use Auth;
use App\Transformers\OrderTransformer;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user = Auth::user();
        $active = 11;
        return view('order.index', compact('active', 'user'));
    }
    public function waitingList(){
        $user = Auth::user();
        $active = 12;
        return view('order.waiting', compact('active', 'user'));
    }
    public function acceptedList(){
        $user = Auth::user();
        $active = 13;
        return view('order.accepted', compact('active', 'user'));
    }
    public function working(){
        $user = Auth::user();
        $active = 14;
        return view('order.working', compact('active', 'user'));
    }
    public function finish(){
        $user = Auth::user();
        $active = 15;
        return view('order.finished', compact('active', 'user'));
    }
    public function archives(){
        $user = Auth::user();
        $active = 16;
        return view('order.archives', compact('active', 'user'));
    }


    public function add(Request $request, Orders $order)
    {
        $this->validate($request, [
            'namaBarang' => 'required',
            // 'alamat' => 'required',
            // 'customerId' => 'required',
            // 'dateIn' => 'required',
            // 'dateOut' => 'required',
            'tipeKerusakan' => 'required',
            'keluhan' => 'required',
            'kelengkapan' => 'required',
            'status' => 'required',
            // 'harga' => 'required',
            // 'dp' => 'required',
            'longitude' => 'required',
            'langitude' => 'required',
        ]);
        $order = $order->create([
            'nama' => $request->namaBarang,
            'alamat' => Auth::user()->alamat,
            'user_id' => Auth::user()->id,
            'dateIn' => date('Y-m-d H:i:s'),
            // 'dateOut' => $request->dateOut,
            'tipeKerusakan' => $request->tipeKerusakan,
            'keluhan' => $request->keluhan,
            'kelengkapan' => $request->kelengkapan,
            'status' => $request->status,
            'harga' => $request->harga,
            'dp' => $request->dp,
            'longitude' => $request->longitude,
            'langitude' => $request->langitude,
        ]);
        $response = fractal()
            ->item($order)
            ->TransformWith(new OrderTransformer)
            ->toArray();

        return response()->json($response, 201);
    }

    public function update(Request $request, Orders $order)
    {
        // dd($order);
        $this->authorize('update', $order);
        $order->nama = $request->get('nama', $order->nama );
        $order->alamat = $request->get('alamat', $order->alamat );
        $order->user_id = $request->get('user_id', $order->user_id );
        $order->dateIn = $request->get('dateIn', $order->dateIn );
        $order->dateOut = $request->get('dateOut', $order->dateOut );
        $order->tipeKerusakan = $request->get('tipeKerusakan', $order->tipeKerusakan );
        $order->keluhan = $request->get('keluhan', $order->keluhan );
        $order->kelengkapan = $request->get('kelengkapan', $order->kelengkapan );
        $order->status = $request->get('status', $order->status );
        $order->harga = $request->get('harga', $order->harga );
        $order->dp = $request->get('dp', $order->dp );
        $order->longitude = $request->get('longitude', $order->longitude );
        $order->langitude = $request->get('langitude', $order->langitude );
        $order->save();

        return fractal()
            ->item($order)
            ->transformWith(new OrderTransformer)
            ->toArray();
    }

    public function orderById(Orders $order, $user_id)
    {
        $order = $order->where('user_id', '=', $user_id)->get();
        $order = (object) $order;
        // dd($order);
        return fractal()
            ->collection($order)
            ->transformWith(new OrderTransformer)
            ->includeOrders()
            ->toArray();
    }

    public function delete(Orders $order)
    {
        $this->authorize('delete', $order);
        $order->delete();
        return response()->json([
            'message' => 'Order telah dihapus!',
        ]);
    }
}
