<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;
use Auth;
use Storage;
use App\Transformers\OrderTransformer;


class ApiOrderController extends Controller
{
    public function add(Request $request, Orders $order)
    {
        $this->validate($request, [
            'namaBarang' => 'required|string',
            // 'alamat' => 'required',
            // 'customerId' => 'required',
            // 'dateIn' => 'required',
            // 'dateOut' => 'required',
            // 'tipeKerusakan' => 'required',
            'alamat' => 'required',
            'keluhan' => 'required',
            'kelengkapan' => 'required',
            'status' => 'required',
            // 'harga' => 'required',
            // 'dp' => 'required',
            'longitude' => 'required',
            'langitude' => 'required',
            'foto'      => 'file|image'
        ]);
        $order = $order->create([
            'nama'          => $request->namaBarang,
            'alamat'        => Auth::user()->alamat,
            'user_id'       => Auth::user()->id,
            'dateIn'        => date('Y-m-d H:i:s'),
            // 'tipeKerusakan' => $request->tipeKerusakan,
            'keluhan'       => $request->keluhan,
            'kelengkapan'   => $request->kelengkapan,
            'status'        => $request->status,
            'harga'         => $request->harga,
            // 'dp'            => $request->dp,
            'longitude'     => $request->longitude,
            'langitude'     => $request->langitude,
        ]);
        if($request->hasfile('foto'))
        {
            if ($order->foto) {
                Storage::delete($order->foto);
            }
            $foto = $request->file('foto')->store('users/order/'.Auth::user()->email);
            $order->where('id', $order->id)->update([
                'foto' => $foto
            ]);
        }
        // String Random Function start
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // String Random Function end
        $kode =  $randomString . $order->id;
        $order->where('id', $order->id)->update([
            'kodeOrder' => $kode
        ]);
        $order = Orders::where('id', $order->id)->first();
        $response = fractal()
            ->item($order)
            ->TransformWith(new OrderTransformer)
            ->toArray();
        return response()->json($response, 201);
    }

    public function update(Request $request, Orders $order)
    {
        $this->authorize('update', $order);
        $order->nama                = $request->get('namaBarang', $order->nama );
        $order->alamat              = $request->get('alamat', $order->alamat );
        $order->tipeKerusakan       = $request->get('tipeKerusakan', $order->tipeKerusakan );
        $order->keluhan             = $request->get('keluhan', $order->keluhan );
        $order->kelengkapan         = $request->get('kelengkapan', $order->kelengkapan );
        $order->status              = $request->get('status', $order->status );
        $order->harga               = $request->get('harga', $order->harga );
        $order->longitude           = $request->get('longitude', $order->longitude );
        $order->langitude           = $request->get('langitude', $order->langitude );
        if ($request->file('foto')) {
            if ($order->foto) {
                Storage::delete($order->foto);
            }
            $foto = $request->file('foto')->store('users/order/'.Auth::user()->email);
            $order->foto = $foto;
        }
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
        return fractal()
            ->collection($order)
            ->transformWith(new OrderTransformer)
            ->includeOrders()
            ->toArray();
    }
    public function delete(Orders $order)
    {
        $this->authorize('delete', $order);
        if ($order->foto) {
            Storage::delete($order->foto);
        }
        $order->delete();
        return response()->json([
            'message' => 'Order telah dihapus!',
        ]);
    }
}
