<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Orders;
use Auth;
use Storage;
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
    public function ambilBarang(Request $request){
        $order = Orders::where('id', '=', $request->id)->first();
        if($order->status == 1){
            $success = $order->update([
                'status' => 2
            ]);
            if($success){
                return back()->with('success', 'Barang telah diambil, masuk ke tahap diagnosa.');
            }
            return back()->with('danger', 'Gagal mengambil barang, silahkan coba lagi.');
        }
        return back()->with('danger', 'Barang tidak ada.');
    }
    public function diagnosa(Request $request){
        $order = Orders::where('id', '=', $request->id)->first();
        $order->durasi = $request->durasi;
        $order->harga = $request->harga;
        $order->tipeKerusakan = $request->tipeKerusakan;
        $order->status = 3;
        if(!$order->save()){
            return back()->with('danger', 'Internal server error, silahkan cobalagi.');
        }
        else{
            return back()->with('success', 'Diagnosa berhasil dikirim.');
        }
    }
    public function mulaiKerjakan(Request $request){
        $order = Orders::where('id', '=', $request->id)->first();
        $order->status = 6;
        if(!$order->save()){
            return back()->with('danger', 'Internal server error, silahkan cobalagi.');
        }
        else{
            return back()->with('success', 'Order masuk tahap pengerjaan.');
        }
    }
    public function hapusOrder(Request $request){
        $order = Orders::where('id', '=', $request->id)->first();
        if(!$order->delete()){
            return back()->with('danger', 'Internal server error, silahkan cobalagi.');
        }
        else{
            return back()->with('success', 'Order berhasil dihapus.');
        }
    }
}
