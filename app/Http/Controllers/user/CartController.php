<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $id_user = \Auth::user()->id;
        $cart = DB::table('cart')
                    ->join('users','users.id','=','cart.user_id')
                    ->join('products', 'products.id','=','cart.product_id')
                    ->select('products.name', 'products.image', 'products.harga', 'products.category', 'cart.*')
                    ->where('cart.user_id', '=', $id_user)
                    ->get();
        $data = [
            'cart' => $cart
        ];
        return view('user.cart', $data);
    }
    public function store(Request $request){
        Cart::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty
        ]);
        return redirect()->route('user.cart');
    }

    public function update(Request $request){
        $ids = $request->input('id');
        $quantities = $request->input('qty');

        foreach ($ids as $index => $id) {
            $cart = Cart::findOrFail($id);
            $cart->qty = $quantities[$index];
            $cart->save();
        }

        return redirect()->route('user.cart');
    }

    public function delete($id){
        Cart::destroy($id);

        return redirect()->route('user.cart');
    }
}
