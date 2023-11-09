<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(){
        $user_id = \Auth::user()->id;
        $cart = DB::table('cart')
                ->join('users','users.id','=','cart.user_id')
                ->join('products','products.id','=','cart.product_id')
                ->select('cart.*','products.name as nameProduct','products.image','products.category','products.harga','users.name as userName','users.phone')
                ->where('cart.user_id','=',$user_id)
                ->get();
        $data = [
            'invoice' => 'ALV'.Date('Ymdhi'),
            'cart' => $cart
        ];
        return view('user.checkout',$data);
    }
}
