<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Storage;

class TransaksiController extends Controller
{
    public function index(){
        $order = DB::table("order")
                ->join('status_order','status_order.id','=','order.status_order_id')
                ->join('users','users.id','=','order.user_id')
                ->select('order.*','users.name as userName','users.phone','status_order.name as statusName')
                ->where('order.status_order_id',1)
                ->get();
        $data = [
            'order' => $order
        ];
        return view('admin.transaksi.pesananBaru',$data);
    }

    public function detail($id){
        $detailOrder = DB::table('detail_order')
                    ->join('products','products.id','=','detail_order.product_id')
                    ->join('order','order.id','=','detail_order.order_id')
                    ->select('detail_order.*','products.name as productName','products.image','products.harga','order.*')
                    ->where('detail_order.order_id',$id)
                    ->get();
        $order = DB::table("order")
            ->join('status_order','status_order.id','=','order.status_order_id')
            ->join('users','users.id','=','order.user_id')
            ->select('order.*','users.name as userName','users.phone','status_order.name as statusName')
            ->where('order.id',$id)
            ->first();
        $data = [
            'detailOrder' => $detailOrder,
            'order' => $order
        ];
        return view('admin.transaksi.detail',$data);
    }

    public function cek(){
        $order = DB::table('order')
                ->join('users','users.id','=','order.user_id')
                ->join('status_order','status_order.id','=','order.status_order_id')
                ->select('order.*','status_order.name as statusName','users.name as userName','users.phone')
                ->where('order.status_order_id','!=',1)
                ->where('order.status_order_id','!=',4)
                ->where('order.status_order_id','!=',6)
                ->get();
        $data = [
            'order' => $order
        ];

        return view('admin.transaksi.perluDiCek',$data);
    }

    public function konfirmasi(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->status_order_id = 6;
        $order->save();

        $kurangStok = DB::table('detail_order')->where('order_id',$id)->get();

        foreach($kurangStok as $minStok){
            $product = DB::table('products')->where('id',$minStok->product_id)->first();
            $changeStoke = $product->stok - $minStok->qty;

            DB::table('products')->where('id',$minStok->product_id)->update(['stok' => $changeStoke]);
        }
        return redirect()->route('admin.transaksi.cek');
    }

    public function tolak($id){
        $order = Order::findOrFail($id);

        Storage::delete('public/'.$order->bukti_bayar);
        $order->status_order_id = 5;
        $order->bukti_bayar = '';
        $order->save();

        return redirect()->route('admin.transaksi.cek');
    }

    public function cancel(){
        $orderCancel = DB::table('order')
                ->join('users','users.id','=','order.user_id')
                ->join('status_order','status_order.id','=','order.status_order_id')
                ->select('order.*','users.*','status_order.name as statusName')
                ->where('status_order_id',4)
                ->get();
        $data = [
            'orderCancel' => $orderCancel
        ];
        return view('admin.transaksi.cancel',$data);
    }

    public function done(){
        $orderDone = DB::table('order')
                ->join('users','users.id','=','order.user_id')
                ->join('status_order','status_order.id','=','order.status_order_id')
                ->select('order.*','users.*','status_order.name as statusName')
                ->where('status_order_id',6)
                ->get();
        $data = [
            'orderDone' => $orderDone
        ];
        return view('admin.transaksi.done',$data);
    }
}
