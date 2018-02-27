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
            'tipeKerusakan' => 'required',
            'keluhan' => 'required',
            'kelengkapan' => 'required',
            'status' => 'required',
            // 'harga' => 'required',
            // 'dp' => 'required',
            'longitude' => 'required',
            'langitude' => 'required',
            // 'foto'      => 'file|image'
        ]);
        $order = $order->create([
            'nama'          => $request->namaBarang,
            'alamat'        => Auth::user()->alamat,
            'user_id'       => Auth::user()->id,
            'dateIn'        => date('Y-m-d H:i:s'),
            // 'dateOut' => $request->dateOut,
            'tipeKerusakan' => $request->tipeKerusakan,
            'keluhan'       => $request->keluhan,
            'kelengkapan'   => $request->kelengkapan,
            'status'        => $request->status,
            'harga'         => $request->harga,
            'dp'            => $request->dp,
            'longitude'     => $request->longitude,
            'langitude'     => $request->langitude,
        ]);
        // if($request->file('foto'))
        // {
        //     if ($order->foto) {
        //         Storage::delete($order->foto);
        //     }
        //     $foto = $request->file('foto')->store('orders/foto');
        //     $order->where('id', $order->id)->update([
        //         'foto' => $foto
        //     ]);
        // }
        if($request->foto)
        {
            if ($order->foto) {
                Storage::delete($order->foto);
            }
            $foto = base64_decode($request->foto);
            $foto = $foto->store('orders/foto');
            $order->where('id', $order->id)->update([
                'foto' => $foto
            ]);
        }
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
        // $order->user_id             = $request->get('user_id', $order->user_id );
        // $order->dateIn              = $request->get('dateIn', $order->dateIn );
        // $order->dateOut             = $request->get('dateOut', $order->dateOut );
        $order->tipeKerusakan       = $request->get('tipeKerusakan', $order->tipeKerusakan );
        $order->keluhan             = $request->get('keluhan', $order->keluhan );
        $order->kelengkapan         = $request->get('kelengkapan', $order->kelengkapan );
        $order->status              = $request->get('status', $order->status );
        $order->harga               = $request->get('harga', $order->harga );
        // $order->dp                  = $request->get('dp', $order->dp );
        $order->longitude           = $request->get('longitude', $order->longitude );
        $order->langitude           = $request->get('langitude', $order->langitude );
        if ($request->file('foto')) {
            if ($order->foto) {
                Storage::delete($order->foto);
            }
            $foto = $request->file('foto')->store('users/foto');
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
        if ($order->foto) {
            Storage::delete($order->foto);
        }
        $order->delete();
        return response()->json([
            'message' => 'Order telah dihapus!',
        ]);
    }
}
