<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products = Products::get();
        $data = [
            'products' => $products,
        ];
        return view('user.product', $data);
    }

    public function detail($id){
        $data = Products::findOrFail($id);
        
        return view('user.productDetail', ['data' => $data]);
    }

}
