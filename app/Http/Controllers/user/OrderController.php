<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        
        $user_id = \Auth::user()->id;

        $order = DB::table('order')
                ->join('status_order','status_order.id','=','order.status_order_id')
                ->select('order.*', 'status_order.name')
                ->where('order.status_order_id','!=','2')
                ->where('order.status_order_id','!=','3')
                ->where('order.status_order_id','!=','4')
                ->where('order.status_order_id','!=','6')
                ->where('order.user_id','=',$user_id)
                ->get();
        $cek_order = DB::table('order')
                ->join('status_order','status_order.id','=','order.status_order_id')
                ->select('order.*', 'status_order.name')
                ->where('order.status_order_id','!=','1')
                ->where('order.status_order_id','!=','3')
                ->where('order.status_order_id','!=','4')
                ->where('order.status_order_id','!=','5')
                ->where('order.status_order_id','!=','6')
                ->where('order.user_id','=',$user_id)
                ->get();
        $dibayar = DB::table('order')
                ->join('status_order','status_order.id','=','order.status_order_id')
                ->select('order.*', 'status_order.name')
                ->where('order.status_order_id','!=','1')
                ->where('order.status_order_id','!=','2')
                ->where('order.status_order_id','!=','4')
                ->where('order.status_order_id','!=','5')
                ->where('order.user_id','=',$user_id)
                ->get();
        $histori = DB::table('order')
                ->join('status_order','status_order.id','=','order.status_order_id')
                ->select('order.*', 'status_order.name')
                ->where('order.status_order_id','!=','1')
                ->where('order.status_order_id','!=','2')
                ->where('order.status_order_id','!=','3')
                ->where('order.status_order_id','!=','5')
                ->where('order.user_id','=',$user_id)
                ->get();
        $orderCondition = DB::table('order')
                ->join('status_order','status_order.id','=','order.status_order_id')
                ->select('order.*', 'status_order.name')
                ->first();
        $data = [
            'order' => $order,
            'cek_order' =>$cek_order,
            'dibayar' =>$dibayar,
            'histori' =>$histori,
            'orderCondition' => $orderCondition
        ];
        return view('user.order.index',$data);
    }
    public function simpan(Request $request){

        $cek_invoice = DB::table('order')
                ->where('invoice',$request->invoice)
                ->count();

        if($cek_invoice < 1){
            $user_id = \Auth::user()->id;
            Order::create([
                'user_id' => $user_id,
                'invoice' => $request->invoice,
                'subtotal' => $request->subtotal,
                'status_order_id' => 1,
                'metode_pembayaran' => $request->metode_pembayaran,
                'pesan' => $request->pesan 
            ]);
            $order = DB::table('order')
                ->where('invoice',$request->invoice)
                ->first();
            
            $cart = DB::table('cart')
                ->where('user_id',$user_id)
                ->get();
            
            foreach($cart as $brg){
                DetailOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $brg->product_id,
                    'qty' => $brg->qty
                ]);
            }
            DB::table('cart')->where('user_id',$user_id)->delete();
            return redirect()->route('user.order.sukses');
        }else{
            return redirect()->route('user.cart');
        }
    }

    public function detail($id){
        $detail_order = DB::table('detail_order')
                    ->join('products','products.id','=','detail_order.product_id')
                    ->join('order','order.id','=','detail_order.order_id')
                    ->select('detail_order.*', 'products.name as nameProduct',)
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
            'detail_order' => $detail_order,
            'order' => $order
        ];
        return view('user.order.detail',$data);
    }

    public function sukses(){
        return view('user.terimakasih');
    }

    public function pembayaran($id){
        $detail_order = DB::table('detail_order')
                ->join('order','order.id','=','detail_order.id')
                ->select('order.subtotal','detail_order.*')
                ->where('detail_order.order_id',$id)
                ->first();
        $data = [
            'rekening' => Rekening::all(),
            'detail_order' => $detail_order,
            'order' => Order::findOrFail($id),
        ];
        return view('user.order.pembayaran',$data);
    }

    public function buktiBayar(Request $request, $id){
        $data = Order::findOrFail($id);
        if($request->file('bukti_bayar')){
            $file = $request->file('bukti_bayar')->store('bukti_bayar', 'public');

            $data->bukti_bayar = $file;
            $data->status_order_id = 2;
            $data->save();
        }
        return redirect()->route('user.order');
    }

    public function orderSelesai($id){
        $data = Order::findOrFail($id);
        $data->status_order_id = 6;
        $data->save();
        return redirect()->route('user.order');
    }

    public function orderBatal($id){
        $data = Order::findOrFail($id);
        $data->status_order_id = 4;
        $data->save();
        return redirect()->route('user.order');
    }
}
